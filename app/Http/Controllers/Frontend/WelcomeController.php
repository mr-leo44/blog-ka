<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $posts = Article::where('is_published', 1)->latest()->paginate(6);
        return view('welcome', compact('posts'));
    }

    public function getPost(Article $post)
    {
        $recent_posts = Article::where('is_published', 1)->where('id', '!=', $post->id)->orderBy('created_at', 'desc')->take(3)->get();
        return view('frontend.post-show', compact('post', 'recent_posts'));
    }

    public function getPostsByCategory(Category $category)
    {
        $posts = Article::where('category_id', $category->id)->latest()->paginate(6);
        return view('frontend.category-posts', compact('posts', 'category'));
    }

    public function getPostsByAuthor(User $user)
    {
        $posts = Article::where('user_id', $user->id)->latest()->paginate(6);
        return view('frontend.author-posts', compact('posts', 'user'));
    }
    public function getPostsByTag(Tag $tag)
    {
        $posts = Article::whereHas('tags', function (Builder $query) use($tag){
            $query->where('id', $tag->id);
        })->latest()->paginate(6);
        return view('frontend.author-posts', compact('posts', 'user'));
    }
}
