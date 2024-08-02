<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('tags.index', compact('tags'));
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
        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index')->with('success', 'Le Hastag a été créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $posts = $tag->articles()->paginate(10);
        return view('tags.show', compact('posts', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
        ]);
        return redirect()->route('tags.index')->with('success', 'Le Hastag a été mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with("success", "suppression du Hastag reussie");
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $tags = Tag::where('name', 'LIKE', "%{$query}%")->get(['id', 'name as text']);

        return response()->json($tags);
    }
}
