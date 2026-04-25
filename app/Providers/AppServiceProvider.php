<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrap();

        View::composer('frontend.partials.header', function ($view) {
            $cartCount = 0;

            if (auth('web')->check()) {
                $cartCount = Cart::where('user_id', auth('web')->id())->sum('quantity');
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
