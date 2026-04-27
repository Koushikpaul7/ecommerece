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
            $cartItems = collect();
            $cartTotal = 0;

            if (auth('web')->check()) {
                $cartItems = Cart::with('product')
                    ->where('user_id', auth('web')->id())
                    ->get();

                $cartCount = $cartItems->sum('quantity');
                $cartTotal = $cartItems->sum(function ($item) {
                    return $item->quantity * $item->price;
                });
            }

            $view->with(compact('cartCount', 'cartItems', 'cartTotal'));
        });
    }
}
