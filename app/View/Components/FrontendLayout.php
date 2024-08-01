<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Builder;

class FrontendLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $categories = Category::all();
        $authors = User::whereHas('profile', function(Builder $query){
            $query->whereNot('role', 'admin');
        })->get();
        $tags = Tag::orderBy('created_at', 'desc')->take(15)->get();
        return view('layouts.frontend', compact('categories', 'authors', 'tags'));
    }
}
