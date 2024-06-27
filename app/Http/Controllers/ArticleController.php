<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
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
        $posts = Article::with(['category', 'user'])->paginate(10);
        $categories = Category::all();
        return view('posts.index', compact('categories', 'posts'));
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
        if ($request->file('cover_img')){
            $cover = $request->file('cover_img')->store('posts/covers');
        }
        Article::create([
            'title' => $request->title, 
            'content' => $request->content, 
            'category_id' => $request->category_id, 
            'user_id' => Auth::user()->id, 
            'cover_img' => $cover ?? null
        ]);

        return redirect()->route('posts.index')->with('success', 'La catégorie a été créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if ($request->hasFile('cover_img')){
            Storage::delete($article->cover_img);
            $cover = $request->file('cover_img')->store('posts/covers');
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content, 
            'category_id' => $request->category_id,
            'cover_img' => $cover ?? $article->cover_img
        ]);
        return redirect()->route('posts.index')->with('success', 'L\'article a été mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->cover_img){
            Storage::delete($article->cover_img);
        }
        $article->delete();
        return redirect()->route('posts.index')->with("success","suppression de l\article reussie");
    }
}
