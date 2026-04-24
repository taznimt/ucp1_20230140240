<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Gate akses category hanya untuk admin
        Gate::define('manage-category', function (User $user) {
            return $user->role === 'admin';
        });

        // Policy product
        Gate::policy(Product::class, ProductPolicy::class);
    }
}