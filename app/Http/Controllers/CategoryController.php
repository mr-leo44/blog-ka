<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
// use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
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
            $cover = $request->file('cover_img')->store('categories/covers');
        }
        Category::create([
            'name' => $request->name, 
            'cover_img' => $cover ?? null
        ]);

        return redirect()->route('categories.index')->with('success', 'La catégorie a été créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if ($request->hasFile('cover_img')){
            Storage::delete($category->cover_img);
            $cover = $request->file('cover_img')->store('categories/covers');
        }

        $category->update([
            'name' => $request->name,
            'cover_img' => $cover ?? $category->cover_img
        ]);
        return redirect()->route('categories.index')->with('success', 'La catégorie a été mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->cover_img);
        $category->delete();
        return redirect()->route('categories.index')->with("success","suppression de la catégorie reussie");
    }
}
