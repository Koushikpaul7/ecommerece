@extends('frontend.layouts.app')

@section('content')
<div id="sns_content" class="wrap layout-m">
    <div class="container">
        <div class="row">
            <div id="sns_main" class="col-md-12 col-main">
                <div id="sns_mainmidle">
                    <div class="block-title" style="margin: 30px 0 20px;">
                        <h3>My Orders</h3>
                    </div>

                    @if($orders->isEmpty())
                        <div class="alert alert-info">
                            You have not placed any orders yet.
                        </div>
                    @else
                        @foreach($orders as $order)
                            @php
                                $statusWidth = match($order->status) {
                                    'pending' => '25%',
                                    'processing' => '55%',
                                    'delivered' => '100%',
                                    'cancelled' => '100%',
                                    default => '15%',
                                };

                                $statusColor = match($order->status) {
                                    'pending' => '#f0ad4e',
                                    'processing' => '#5bc0de',
                                    'delivered' => '#5cb85c',
                                    'cancelled' => '#d9534f',
                                    default => '#999999',
                                };
                            @endphp

                            <div class="panel panel-default" style="margin-bottom: 25px; border: 1px solid #e5e5e5;">
                                <div class="panel-heading" style="background: #f8f8f8; padding: 18px 20px;">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4 style="margin: 0 0 6px; font-weight: 600;">{{ $order->order_number }}</h4>
                                            <p style="margin: 0; color: #777;">
                                                Placed on {{ $order->created_at->format('d M Y, h:i A') }}
                                            </p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <span class="label" style="background: {{ $statusColor }}; padding: 8px 14px; display: inline-block; font-size: 12px;">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                            <p style="margin: 10px 0 0; font-weight: 600;">Total: ${{ number_format($order->total_amount, 2) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body" style="padding: 20px;">
                                    <div style="margin-bottom: 20px;">
                                        <div style="display: flex; justify-content: space-between; font-size: 13px; color: #666; margin-bottom: 8px;">
                                            <span>Order placed</span>
                                            <span>Processing</span>
                                            <span>{{ $order->status === 'cancelled' ? 'Cancelled' : 'Delivered' }}</span>
                                        </div>
                                        <div style="height: 8px; background: #eeeeee; border-radius: 999px; overflow: hidden;">
                                            <div style="height: 8px; width: {{ $statusWidth }}; background: {{ $statusColor }};"></div>
                                        </div>
                                        @if($order->canBeCancelledByUser())
                                            <p style="margin: 10px 0 0; color: #777;">
                                                You can cancel this order until {{ $order->created_at->copy()->addDays(3)->format('d M Y, h:i A') }}.
                                            </p>
                                        @elseif($order->status === 'cancelled')
                                            <p style="margin: 10px 0 0; color: #d9534f;">This order has been cancelled.</p>
                                        @elseif($order->status === 'delivered')
                                            <p style="margin: 10px 0 0; color: #5cb85c;">This order was delivered successfully.</p>
                                        @else
                                            <p style="margin: 10px 0 0; color: #777;">The cancellation window for this order has expired.</p>
                                        @endif
                                    </div>

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
                                                @foreach($order->orderItems as $item)
                                                    <tr>
                                                        <td>
                                                            @if($item->product)
                                                                <a href="{{ route('frontend.productDetails', $item->product->slug) }}">
                                                                    {{ $item->product->name }}
                                                                </a>
                                                            @else
                                                                Product unavailable
                                                            @endif
                                                        </td>
                                                        <td>${{ number_format($item->price, 2) }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-md-8">
                                            <p style="margin-bottom: 6px;"><strong>Shipping To:</strong> {{ $order->name }}</p>
                                            <p style="margin-bottom: 6px;"><strong>Phone:</strong> {{ $order->phone }}</p>
                                            <p style="margin-bottom: 0;"><strong>Address:</strong> {{ $order->address }}</p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            @if($order->canBeCancelledByUser())
                                                <form action="{{ route('user.orders.cancel', $order->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order?')">Cancel Order</button>
                                                </form>
                                            @endif

                                            @if($order->canBeReorderedByUser())
                                                <form action="{{ route('user.orders.reorder', $order->id) }}" method="POST" style="display: inline-block; margin-left: 10px;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Reorder</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
