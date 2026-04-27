@extends('frontend.layouts.app')
@section('content')
<div class="container my-5">
    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <h4>Shipping Details</h4>
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" readonly required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly required>
                </div>
                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Full Address</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card p-3 shadow-sm">
                    <h4>Order Summary</h4>
                    <hr>
                    @foreach($cartItems as $item)
                        <div class="d-flex justify-content-between">
                            <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
                            <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="mt-3">
                        <label><input type="radio" checked disabled> Cash on Delivery (COD)</label>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-success w-100 mt-3">Place Order</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection