<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        if($cartItems->isEmpty()) return redirect()->route('frontend.index');
        
        $total = $cartItems->sum(fn($i) => $i->price * $i->quantity);
        return view('frontend.checkout', compact('cartItems', 'total'));
    }
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

       $cartItems = Cart::where('user_id', Auth::id())->get();
        $total = $cartItems->sum(fn($i) => $i->price * $i->quantity);

        DB::transaction(function () use ($request, $cartItems, $total) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_amount' => $total,
                'payment_method' => 'cod',
                'status' => 'pending',
            ]);

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                ]);
            }

            Cart::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('frontend.index')->with('success', 'Order placed successfully!');
    }
}
