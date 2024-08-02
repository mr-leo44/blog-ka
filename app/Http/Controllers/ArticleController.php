<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use App\Http\Requests\StoreArticleRequest;
// use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->profile->role->value === 'admin') {
            $posts = Article::with(['category', 'user'])->where('is_published', false)->latest()->paginate(5);
        } else {
            $posts = Article::with(['category', 'user'])->where('user_id', Auth::user()->id)->latest()->paginate(5);
        }
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.index', compact('categories', 'posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('cover_img')) {
            $cover = $request->file('cover_img')->store('posts/covers');
        }
        $post = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'cover_img' => $cover ?? null,
            'read_time' => (int)ceil((Str::wordCount($request->content) / 265) * 60)
        ]);

        if($post) {
            $tags = collect($request->tags)->map(function($tag){
                return Tag::firstOrCreate(['name' => $tag])->id;
            });

            $post->tags()->sync($tags);
        }

        return redirect()->route('posts.index')->with('success', 'Le post a été créé avec succès');
    }

    /**
     * Publish the specified resource.
     */
    public function publish(Article $post)
    {
        $post->update([
            'is_published' => 1
        ]);

        return back()->with('success', "L'article a été publié avec succès");
    }

    /**
     * Unublish the specified resource.
     */
    public function unpublish(Article $post)
    {
        $post->update([
            'is_published' => 0
        ]);
        return back()->with('success', "L'article a été desactivé avec succès");
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit(Article $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $post)
    {
        if ($request->hasFile('cover_img')) {
            if ($post->cover_img) {
                Storage::delete($post->cover_img);
            }
            $cover = $request->file('cover_img')->store('posts/covers');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'cover_img' => $cover ?? $post->cover_img,
            'read_time' => (int)ceil((Str::wordCount($request->content) / 265) * 60)
        ]);

        if($post) {
            $tags = collect($request->tags)->map(function($tag){
                return Tag::firstOrCreate(['name' => $tag])->id;
            });

            $post->tags()->sync($tags);
        }
        
        return redirect()->route('posts.index')->with('success', 'L\'article a été mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $post)
    {
        if ($post->cover_img) {
            Storage::delete($post->cover_img);
        }
        $post->delete();
        return redirect()->route('posts.index')->with("success", "suppression de l'article reussie");
    }
}
