<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\View\Component;

class FrontendLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $categories = Category::all();
        $authors = User::all();
        return view('layouts.frontend', compact('categories', 'authors'));
    }
}
