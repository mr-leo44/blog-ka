<?php

namespace App\Providers;

use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Blade::if('profile', function (string $environment) {
            if($environment === 'admin' && Auth::user()->profile->role->value === RoleEnum::ADMIN->value){
                $profile = true;
            } elseif($environment === 'author' && Auth::user()->profile->role->value === RoleEnum::AUTHOR->value){
                $profile = true;
            } elseif($environment === 'manager' && Auth::user()->profile->role->value === RoleEnum::MANAGER->value){
                $profile = true;
            } elseif ($environment === 'dash' && Auth::user()->profile->role->value !== RoleEnum::AUTHOR->value) {
                $profile = true;
            }
            else {
                $profile = false;
            }
            return $profile;
        });
    }
}
