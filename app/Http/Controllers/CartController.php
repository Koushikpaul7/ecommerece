<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product){
       $request->validate([
           'qty'=>'required|integer|min:1'
       ]);
       Cart::create([
           'user_id'=>Auth::id(),
           'product_id'=>$product->id,
           'quantity'=>$request->qty ?? 1,
           'price'=>$product->price,
       ]);

       return back()->with('success','Product added to cart successfully');
    }
    public function showCart(){
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        $total= $cartItems->sum(function($item){
            return $item->quantity * $item->price;
        });
        return view('frontend.cartpage', compact('cartItems', 'total'));
    }
    public function removeFromCart(Cart $cart){
       $item=Cart::where('id', $cart->id)->where('user_id', Auth::id())->firstOrFail();
        $item->delete();
        return back()->with('success','Item removed from cart successfully.');
    }

    public function updateCart(Request $request){
        $request->validate([
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
        ]);

        $cartItems = Cart::where('user_id', Auth::id())
            ->whereIn('id', array_keys($request->quantity))
            ->get()
            ->keyBy('id');

        foreach ($request->quantity as $cartId => $quantity) {
            if (isset($cartItems[$cartId])) {
                $cartItems[$cartId]->quantity = $quantity;
                $cartItems[$cartId]->save();
            }
        }

        return back()->with('success','Cart updated successfully.');
    }

    public function clearCart(){
        Cart::where('user_id', Auth::id())->delete();
        return back()->with('success','Cart cleared successfully.');
    }
}
