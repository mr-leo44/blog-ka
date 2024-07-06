<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $posts = Article::where('is_published', 1)->latest()->paginate(24);
        return view('welcome', compact('posts'));
    }

    public function getPost(Article $post)
    {
        return view('frontend.post-show', compact('post'));
    }

    public function getCategories()
    {
        $categories = Category::latest()->paginate(10);
        return view('frontend.categories', compact('categories'));
    
    }
    public function getPostsByCategory(Category $category)
    {
        $posts = Article::where('category_id', $category->id);
        return view('frontend.category-posts', compact('posts'));
        
    }
    public function getAuthors()
    {
        $authors = User::latest()->paginate(10);
        return view('frontend.authors', compact('authors'));
    
    }
    public function getPostsByAuthor(User $user)
    {
        $posts = Article::where('user_id', $user->id);
        return view('frontend.author-posts', compact('posts'));
    }
}