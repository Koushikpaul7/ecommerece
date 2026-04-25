<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
}
