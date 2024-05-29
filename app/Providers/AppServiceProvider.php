<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrapFive();

        Gate::define('superadmin', function (User $user) {
            return $user->role === 'superadmin';
        });

        Gate::define('admin', function (User $user) {
            return $user->role === 'admin' || $user->role === 'superadmin';
        });
    }
}
