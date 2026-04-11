@extends('admin.layouts.app')
@section('index', 'Edit Product')
@section('content')
<div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" id="name"
                        placeholder="Enter Product Name" value="{{ $product->name ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description"
                        placeholder="Enter Product Description">{{ $product->description ?? '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="price" step="0.01"
                        placeholder="Enter Product Price" value="{{ $product->price ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" class="form-control" id="category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control" id="image" />
                    @if($product->image)
                        <div class="mt-3">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid" width="200">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" {{ $product->is_featured ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            Featured Product
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_top_sell" id="is_top_sell" {{ $product->is_top_sell ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_top_sell">
                            Top Selling Product
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_top_rated" id="is_top_rated" {{ $product->is_top_rated ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_top_rated">
                            Top Rated Product
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Product</button>
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection