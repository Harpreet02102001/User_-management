<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the UserPolicy to handle authorization for User model
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::policy(User::class, UserPolicy::class);
    }
}
