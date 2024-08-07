<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::where('username', $request->username)->first();
        if($user->profile->is_activated){
            $request->authenticate();

            $request->session()->regenerate();

            if($user->profile->role->value === RoleEnum::AUTHOR->value) {
                return redirect()->intended(route('posts.index', absolute: false));
            } else {
                return redirect()->intended(route('dashboard', absolute: false));
            }

        } else {
            return back()->with('error', 'Ce compte n\'est pas activé. Pière de contacter le technicien');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
