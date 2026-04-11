@extends('admin.layouts.app')
@section('index', 'Product List')
@section('content')
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Products</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($products as $product)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product->name ?? ''
                                }}</strong></td>
                        <td width="20%"><img src="{{ asset($product->image ?? '') }}" alt="{{ $product->name ?? '' }}"
                                class="img-fluid" width="100"></td>
                        <td>${{ number_format($product->price ?? 0, 2) }}</td>
                        <td>{{ optional($product->category)->name ?? 'N/A' }}</td>
                        <td>@if($product->quantity > 10)
                            <span class="badge bg-success">In Stock ({{ $product->quantity }})</span>
                            @elseif($product->quantity <= 10 && $product->quantity > 0)
                                <span class="badge bg-warning text-dark">Low Stock (Only {{ $product->quantity }}
                                    left!)</span>
                                @else
                                <span class="badge bg-danger">Out of Stock</span>
                                @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.products.toggleStatus', $product->id) }}" method="POST"
                                id="status-form-{{ $product->id }}" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="switch-{{ $product->id }}" {{ $product->status ? 'checked' : '' }}
                                    onchange="document.getElementById('status-form-{{ $product->id }}').submit();" />
                                    <label class="form-check-label" for="switch-{{ $product->id }}">
                                        {{ $product->status ? 'Active' : 'Inactive' }}
                                    </label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

    @endsection