<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric|min:0',
            'quantity'=>'required|integer|min:0',
            'category_id'=>'required|exists:categories,id',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name) . '-' . time();
        $data['is_featured'] = $request->has('is_featured');
        $data['is_top_sell'] = $request->has('is_top_sell');
        $data['is_top_rated'] = $request->has('is_top_rated');
        if ($request->hasFile('image')) {
            $path = 'images/products/';
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path($path), $imageName);
            $data['image'] = $path . $imageName;
        }
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'category_id'=>'required|exists:categories,id',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name) . '-' . time();
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_top_sell'] = $request->has('is_top_sell') ? 1 : 0;
        $data['is_top_rated'] = $request->has('is_top_rated') ? 1 : 0;
        if ($request->hasFile('image')) {
            $path = 'images/products/';
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path($path), $imageName);
            $data['image'] = $path . $imageName;
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success','Product updated successfully');
    }

    public function toggleStatus(Product $product)
    {
        $product->status = !$product->status;
        $product->save();
        return back()->with('success', 'Product status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Product deleted successfully');
    }
}
