<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $banners=Banner::all();
        $featured=Product::where('status', 1)
        ->where('is_featured', 1)
        ->where('quantity', '>', 0)
        ->latest()
        ->take(5)->get();

        $topsellings=Product::where('status', 1)
        ->where('quantity', '>', 0)
        ->where('is_top_sell', 1)
        ->latest()
        ->take(5)->get();

        $toprateds=Product::where('status', 1)
        ->where('quantity', '>', 0)
        ->where('is_top_rated', 1)
        ->latest()
        ->take(5)->get();
        $categories=Category::where('status', 1)->with('products')->latest()->get();
        return view('frontend.index', compact('banners', 'featured', 'topsellings', 'toprateds', 'categories'));
    }
    public function productList()
    {
        $products=Product::where('status', 1)->where('quantity', '>', 0)->latest()->paginate(5);
        return view('frontend.productList', compact('products'));
    }

    public function productDetails($slug)
    {
        $product=Product::with('category')
        ->where('slug', $slug)
        ->where('status', 1)
        ->where('quantity', '>', 0)
        ->firstOrFail();
        $relatedProducts=Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->where('status', 1)
        ->where('quantity', '>', 0)
        ->latest()
        ->take(4)
        ->get();
        return view('frontend.productDetails', compact('product', 'relatedProducts'));

    }
    public function myOrders()
    {
        $orders = Order::with(['orderItems.product'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('frontend.myOrders', compact('orders'));
    }

    public function cancelOrder(Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);

        if (! $order->canBeCancelledByUser()) {
            return back()->with('error', 'This order can no longer be cancelled.');
        }

        $order->update(['status' => 'cancelled']);

        return back()->with('success', 'Your order has been cancelled successfully.');
    }

    public function reorder(Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);

        if (! $order->canBeReorderedByUser()) {
            return back()->with('error', 'Only delivered orders can be reordered.');
        }

        $itemsAdded = 0;

        DB::transaction(function () use ($order, &$itemsAdded) {
            $order->loadMissing('orderItems.product');

            foreach ($order->orderItems as $item) {
                $product = $item->product;

                if (! $product || ! $product->status || $product->quantity < 1) {
                    continue;
                }

                $cartItem = Cart::where('user_id', Auth::id())
                    ->where('product_id', $product->id)
                    ->first();

                if ($cartItem) {
                    $cartItem->increment('quantity', $item->quantity);
                } else {
                    Cart::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product->id,
                        'quantity' => $item->quantity,
                        'price' => $product->price,
                    ]);
                }

                $itemsAdded++;
            }
        });

        if ($itemsAdded === 0) {
            return back()->with('error', 'No available products from this order could be added to your cart.');
        }

        return redirect()->route('frontend.cartpage')->with('success', 'Order items were added to your cart for reorder.');
    }
}
