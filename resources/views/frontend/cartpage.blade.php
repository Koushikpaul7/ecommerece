@extends('frontend.layouts.app')
@section('title', 'Shopping Cart')
@section('content')

<!-- BREADCRUMBS -->
<div id="sns_breadcrumbs" class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="sns_titlepage"></div>
                <div id="sns_pathway" class="clearfix">
                    <div class="pathway-inner">
                        <span class="icon-pointer "></span>
                        <ul class="breadcrumbs">
                            <li class="home">
                                <a title="Go to Home Page" href="{{ route('frontend.index') }}">
                                    <i class="fa fa-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="category3 last">
                                <span>Shopping cart</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- AND BREADCRUMBS -->

<!-- CONTENT -->
<div id="sns_content" class="wrap layout-m">
    <div class="container">
        <div class="row">
            <div class="shoppingcart">
                <div class="sptitle col-md-12">
                    <h3>SHOPPING CART</h3>
                    <h4 class="style">PROCEED TO CHECKOUT</h4>
                </div>
                <div class="content col-md-12">
                    <ul class="title clearfix">
                        <li class="text1"><a href="#">PRODUCT NAME</a></li>
                        <li class="text2"><a href="#">UNIT PRICE</a></li>
                        <li class="text2"><a href="#">QTY</a></li>
                        <li class="text2"><a href="#">SUB TOTAL</a></li>
                    </ul>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        @foreach($cartItems as $item)
                        <ul class="nav-mid clearfix">
                            <li class="item-title"><a href="#">{{ $item->product->name }}</a></li>
                            <li class="image"><a href="#"><img style="width: 100px"
                                        src="{{ asset($item->product->image)}}" alt=""></a>
                            </li>
                            <li class="price1">${{ number_format($item->price, 2) }}</li>
                            <li class="number">
                                <input type="number" name="quantity[{{ $item->id }}]" value="{{ $item->quantity }}"
                                    min="1" class="form-control" style="width:60px;">
                            </li>
                            <li class="price2">${{ number_format($item->price * $item->quantity, 2) }}</li>
                            <li class="icon2">
                                <button class="btn-remove fa fa-remove" type="submit" form="remove-cart-{{ $item->id }}">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </li>
                        </ul>
                        @endforeach
                        <ul class="nav-bot clearfix">
                            <li class="continue"><a href="{{ route('frontend.productList') }}">Continue shopping</a>
                            </li>
                            @if($cartItems->count() > 0)
                            <li class="clear">
                                <button class="btn btn-danger" type="submit" form="clear-cart-form"
                                    onclick="return confirm('Are you sure you want to clear your shopping cart?')">clear
                                    shopping cart</button>
                            </li>
                            <li class="update">
                                <button class="btn btn-success" type="submit">update shopping cart</button>
                            </li>
                            @endif
                        </ul>
                    </form>

                    @foreach($cartItems as $item)
                    <form id="remove-cart-{{ $item->id }}" action="{{ route('cart.remove', $item) }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endforeach

                    <form id="clear-cart-form" action="{{ route('cart.clear') }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>

                    <div class="row">
                        <form class="col-md-4">
                            <div class="form-bd">
                                <h3>ESTIMATE SHIPPING AND TAX</h3>
                                <p class="text1">Enter your destination to get a shipping estimate.</p>
                                <p class="country">
                                    <span class="color1">*</span>Country
                                </p>
                                <select id="country" class="validate-select" title="Country" name="country_id">
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                </select>

                                <p>State/Province</p>

                                <select id="region_id" class="required-entry validate-select" title="State/Province"
                                    name="region_id">
                                    <option value="">Please select region, state or province</option>
                                    <option value="1">Alabama</option>
                                    <option value="2">Alaska</option>
                                    <option value="3">American Samoa</option>
                                    <option value="4">Arizona</option>
                                    <option value="5">Arkansas</option>
                                    <option value="6">Armed Forces Africa</option>
                                    <option value="7">Armed Forces Americas</option>
                                    <option value="8">Armed Forces Canada</option>
                                    <option value="9">Armed Forces Europe</option>
                                    <option value="10">Armed Forces Middle East</option>
                                </select>
                                <p class="zip">Zip/Postal Code</p>
                                <input class="style23" type="text" value="" size="30" />
                                <span class="style-bd">Get a quote</span>
                            </div>
                        </form>
                        <form class="col-md-4">
                            <div class="form-bd">
                                <h3>DISCOUNT CODES</h3>
                                <p class="formbd2">Enter your coupon code if you have one.</p>
                                <input class="styleip" type="text" value="" size="30" />
                                <span class="style-bd">Apply coupon</span>
                            </div>
                        </form>
                        <form class="form-right col-md-4">
                            <div class="form-bd">
                                <p class="subtotal">
                                    <span class="text1">SUBTOTAL:</span>
                                    <span class="text2">${{ number_format($total, 2) }}</span>
                                </p>
                                <h3>
                                    <span class="text3">GRAND TOTAL:</span>
                                    <span class="text4">${{ number_format($total, 2) }}</span>
                                </h3>
                                <span class="style-bd">Proceed to checkout</span>
                                <p class="checkout">Checkout with Multiple Addresses</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- AND CONTENT -->

@endsection
