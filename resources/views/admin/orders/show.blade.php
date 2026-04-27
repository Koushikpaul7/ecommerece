@extends('admin.layouts.app')
@section('index', 'Order Details')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Order {{ $order->order_number }}</h5>
                        <small class="text-muted">Placed on {{ $order->created_at->format('d M Y, h:i A') }}</small>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($order->orderItems as $item)
                                    <tr>
                                        <td>{{ optional($item->product)->name ?? 'Product not found' }}</td>
                                        <td>${{ number_format($item->price, 2) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No order items found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Total</th>
                                    <th>${{ number_format($order->total_amount, 2) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Customer Information</h5>
                </div>
                <div class="card-body">
                    <p class="mb-2"><strong>Name:</strong> {{ $order->name }}</p>
                    <p class="mb-2"><strong>Email:</strong> {{ $order->email }}</p>
                    <p class="mb-2"><strong>Phone:</strong> {{ $order->phone }}</p>
                    <p class="mb-0"><strong>Address:</strong> {{ $order->address }}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Manage Order</h5>
                </div>
                <div class="card-body">
                    <p class="mb-2"><strong>Payment Method:</strong> {{ strtoupper($order->payment_method) }}</p>
                    <p class="mb-3"><strong>Current Status:</strong> {{ ucfirst($order->status) }}</p>

                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="status" class="form-label">Update Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
