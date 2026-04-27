<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


// frontend route
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
// product list page
Route::get('/productList', [FrontendController::class, 'productList'])->name('frontend.productList');
// product detail page
Route::get('/productDetails/{slug}', [FrontendController::class, 'productDetails'])->name('frontend.productDetails');




Route::get('/login',[AuthController::class,'Showlogin'])->name('login');
Route::post('/login',[AuthController::class,'adminLogin'])->name('login.submit');
Route::post('/admin/logout',[AuthController::class,'adminLogout'])->name('admin.logout');

// user registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// This replaces or works alongside your existing login route
Route::get('/user/login', [AuthController::class, 'showUserLogin'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'userLogin'])->name('user.login.submit');
Route::post('/user/logout', [AuthController::class, 'userLogout'])->name('user.logout');

// add to cart
Route::middleware(['auth'])->group(function () {
    Route::post('/addToCart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('frontend.cartpage');
    // UPDATE and DELETE routes for cart items can be added here
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove/{cart}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

    // checkout routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('order.place');
    Route::get('/order-success', function() {
        return view('frontend.order_success');
    })->name('frontend.order.success');
    // user order history route
    Route::get('/my-orders', [FrontendController::class, 'myOrders'])->name('user.orders');
    Route::patch('/my-orders/{order}/cancel', [FrontendController::class, 'cancelOrder'])->name('user.orders.cancel');
    Route::post('/my-orders/{order}/reorder', [FrontendController::class, 'reorder'])->name('user.orders.reorder');
});


// Admin Dashboard Route

Route::middleware(['auth:admin','admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // banner routes

    Route::get('/banners', [BannerController::class, 'index'])->name('admin.banners.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('admin.banners.store');
    Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
    Route::put('/banners/{banner}', [BannerController::class, 'update'])->name('admin.banners.update');

    Route::patch('/banners/{banner}/toggle-status', [BannerController::class, 'toggleStatus'])->name('admin.banners.toggleStatus');
    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');

    // Category routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::patch('/categories/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])->name('admin.categories.toggleStatus');

    // Product routes
    Route::resource('products', ProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'show' => 'admin.products.show',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);
    Route::patch('/products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('admin.products.toggleStatus');

    // order management routes
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

    Route::middleware(['superadmin'])->group(function () {
        Route::resource('users', AdminUserController::class)->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'show' => 'admin.users.show',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);
    });
    // List of products with low stock
});
