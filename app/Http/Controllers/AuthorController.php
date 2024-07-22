<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rules\Password;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = User::whereHas('profile', function(Builder $query) {
            $query->where('role', '!=', 'admin');
        })->latest()->paginate(10);
        return view('authors.index', compact('authors'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
        ]);

        if($user){
            Profile::create([
                'role' => 'authors',
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('authors.index')->with('success', 'L\'auteur a été créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $author)
    {
        //
    }

    public function activation(Request $request, User $author)
    {
        $profile = Profile::where('user_id', $request->id)->first();
        $profile->update([
            'is_activated' => (int)($request->is_activated)
        ]);
        if($profile->is_activated === 1){
            return back()->with('success', 'Compte activé avec succès');
        } else {
            return back()->with('success', 'Compte désactivé avec succès');
        }
    }

    public function passwordReset(Request $request, User $author)
    {
        $author = User::find($request->id);
        $author->update([
            'password' => Hash::make('12345678'),
        ]);
        return back()->with('success', 'Mot de passe réinitialisé avec succès');
    }
}
