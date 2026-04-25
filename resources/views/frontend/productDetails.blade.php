@extends('frontend.layouts.app')
@section('title', '$product->name')
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
                                <a title="Go to Home Page" href="#">
                                    <i class="fa fa-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            @if($product)

                            <li class="category3 last">
                                <span>{{ $product->name }}</span>
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
            <div id="sns_main" class="col-md-12 col-main">
                <div id="sns_mainmidle">
                    <div class="product-view sns-product-detail">
                        <div class="product-essential clearfix">
                            <div class="row row-img">

                                <div class="product-img-box col-md-4 col-sm-5">
                                    <div class="detail-img">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="small-img">
                                        <div id="sns_thumbail" class="owl-carousel owl-theme">
                                            <div class="item">
                                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="product_shop" class="product-shop col-md-8 col-sm-7">
                                    <div class="item-inner product_list_style">
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a title="{{ $product->name }}" href="index3-detail.html">{{
                                                    $product->name }}</a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                    <span class="regular-price">
                                                        <span class="price">${{ number_format($product->price, 2)
                                                            }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="availability">
                                                <p class="style1">Availability: @if($product->quantity > 0) In Stock
                                                    @else Out of Stock @endif</p>
                                            </div>
                                            <div class="rating-block">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:60%"></div>
                                                    </div>
                                                    <span class="amount">
                                                        <a href="#">(1 Reviews)</a>
                                                        <span class="separator">|</span>
                                                        <a href="#">Add Your Review</a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="desc std">
                                                <h5>QUICK OVERVIEW</h5>
                                                <p>{{ $product->description }}</p>
                                            </div>
                                            <div class="actions">
                                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                                    @csrf
                                                    
                                                    @if(Auth::check())
                                                    <label class="gfont" for="qty">Qty : </label>
                                                    <div class="qty-container">
                                                        <button class="qty-decrease"
                                                            onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty ) && qty > 1 ) qty_el.value--;return false;"
                                                            type="button"></button>
                                                        <input id="qty" class="input-text qty" type="text" title="Qty"
                                                            value="1" name="qty">
                                                        <button class="qty-increase"
                                                            onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;"
                                                            type="button"></button>
                                                    </div>
                                                    <button type="submit" class="btn-cart" title="Add to Cart"
                                                        data-id="qv_item_8">
                                                        Add to Cart
                                                    </button>
                                                    @endif
                                                     @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <ul class="add-to-links">
                                                        <li>
                                                            <a class="link-wishlist"
                                                                data-original-title="Add to Wishlist"
                                                                data-toggle="tooltip" href="#" title=""></a>
                                                        </li>
                                                        <li>
                                                            <a class="link-compare" data-original-title="Add to Compare"
                                                                data-toggle="tooltip" href="#" title=""></a>
                                                        </li>
                                                        <li>
                                                            <div class="wrap-quickview" data-id="qv_item_8">
                                                                <div class="quickview-wrap">
                                                                    <a class="sns-btn-quickview qv_btn"
                                                                        data-original-title="View" data-toggle="tooltip"
                                                                        href="{{ route('frontend.productDetails', $product->slug) }}">
                                                                        <span>View</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>
                                            </div>
                                            <div class="addthis_native_toolbox"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="bottom row">
            <div class="2coloum-left">
                <div id="sns_left" class="col-md-3">
                    <div class="bestsale">
                        <div class="title">
                            <h3>BEST SALE</h3>
                        </div>
                        <div class="content">
                            <div id="products_slider12" class="products-slider12 owl-carousel owl-theme"
                                style="display: inline-block">
                                <div class="item-row">
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/10.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/11.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/12.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/13.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-row">
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/14.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/15.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/16.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/17.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-row">
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/18.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/19.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/20.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/21.html">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <span class="price">
                                                                <span class="price1">$ 540.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block block-banner banner5">
                        <a href="#" class="banner22">
                            <img src="images/blog-banner1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div id="sns_mainm" class="col-md-9">
                    <div id="sns_description" class="description">
                        <div class="sns_producttaps_wraps1">
                            <h3 class="detail-none">Description
                                <i class="fa fa-align-justify"></i>
                            </h3>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active style-detail"><a href="#home" aria-controls="home"
                                        role="tab" data-toggle="tab">Product Description</a></li>
                                <li role="presentation" class="style-detail"><a href="#profile" aria-controls="profile"
                                        role="tab" data-toggle="tab">Reviews</a></li>
                                <li role="presentation" class="style-detail"><a href="#messages"
                                        aria-controls="messages" role="tab" data-toggle="tab">Product Tags</a></li>
                            </ul>




                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="style1">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="collateral-box">
                                        <div class="form-add">
                                            <h2>Write Your Own Review</h2>
                                            <form id="review-form">
                                                <input type="hidden" value="8haZqMXtybxMqfBa" name="form_key">
                                                <fieldset>
                                                    <h3>
                                                        You're reviewing:
                                                        <span>Cfg Armani Blue</span>
                                                    </h3>
                                                    <ul class="form-list">
                                                        <li>
                                                            <label class="required" for="nickname_field">
                                                                <em>*</em>
                                                                Nickname
                                                            </label>
                                                            <div class="input-box">
                                                                <input id="nickname_field"
                                                                    class="input-text required-entry" type="text"
                                                                    value="" name="nickname">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label class="required" for="summary_field">
                                                                <em>*</em>
                                                                Summary of Your Review
                                                            </label>
                                                            <div class="input-box">
                                                                <input id="summary_field"
                                                                    class="input-text required-entry" type="text"
                                                                    value="" name="title">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label class="required" for="review_field">
                                                                <em>*</em>
                                                                Review
                                                            </label>
                                                            <div class="input-box">
                                                                <textarea id="review_field" class="required-entry"
                                                                    rows="3" cols="5" name="detail"></textarea>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </fieldset>
                                                <div class="buttons-set">
                                                    <button class="button" title="Submit Review" type="submit">
                                                        <span>
                                                            <span>Submit Review</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">
                                    <div class="collateral-box">
                                        <p>
                                            <img alt="" src="http://placehold.it/240x180" style="margin-top: 5px;">
                                        </p>
                                        <p>Retra faucibus eu laoreet nunc. Tincidunt nulla a Nulla eu convallis
                                            scelerisque sociis nulla interdum et. Cursus senectus aliquet pretium at
                                            tristique hac ullamcorper adipiscing et Donec. Enim montes parturient.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="products-upsell">
                        <div class="detai-products1">
                            <div class="title">
                                <h3>Related products</h3>
                            </div>
                            <div class="products-grid">
                                <div id="related_upsell" class="item-row owl-carousel owl-theme"
                                    style="display: inline-block">
                                    @foreach($relatedProducts as $relproduct)
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <div class="ico-label">
                                                        @if($relproduct->is_featured)<span
                                                            class="ico-product ico-sale">Sale</span>@endif
                                                    </div>
                                                    <a class="product-image have-additional"
                                                        href="{{ route('frontend.productDetails', $relproduct->slug) }}"
                                                        title="{{ $relproduct->name }}">
                                                        <span class="img-main">
                                                            <img src="{{asset($relproduct->image) }}"
                                                                alt="{{ $relproduct->image }}">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="{{ route('frontend.productDetails', $relproduct->slug) }}"
                                                                title="{{ $relproduct->name }}"> {{ $relproduct->name }}
                                                            </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ {{
                                                                            number_format($relproduct->price, 2)
                                                                            }}</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action-bot">
                                                    <div class="wrap-addtocart">
                                                        <button class="btn-cart" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    </div>
                                                    <div class="actions">
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" title="Add to Wishlist"
                                                                    href="#">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" title="Add to Compare" href="#">
                                                                    <i class="fa fa-random"></i>
                                                                </a>
                                                            </li>
                                                            <li class="wrap-quickview" data-id="qv_item_7">
                                                                <div class="quickview-wrap">
                                                                    <a class="sns-btn-quickview qv_btn" href="#">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="products-related">
                        <div class="detai-products1">
                            <div class="title">
                                <h3>Related products</h3>
                            </div>
                            <div class="products-grid">
                                <form class="top">
                                    <input type="checkbox" name="vehicle" value="Bike">Check all products
                                </form>
                                <div id="related_upsell1" class="item-row owl-carousel owl-theme"
                                    style="display: inline-block">
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <form class="bot">
                                                        <input type="checkbox" name="vehicle" value="Bike">
                                                    </form>
                                                    <div class="ico-label">
                                                        <span class="ico-product ico-sale">Sale</span>
                                                    </div>
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/8.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action-bot">
                                                    <div class="wrap-addtocart">
                                                        <button class="btn-cart" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    </div>
                                                    <div class="actions">
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" title="Add to Wishlist"
                                                                    href="#">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" title="Add to Compare" href="#">
                                                                    <i class="fa fa-random"></i>
                                                                </a>
                                                            </li>
                                                            <li class="wrap-quickview" data-id="qv_item_7">
                                                                <div class="quickview-wrap">
                                                                    <a class="sns-btn-quickview qv_btn" href="#">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <form class="bot">
                                                        <input type="checkbox" name="vehicle" value="Bike">
                                                    </form>
                                                    <div class="ico-label">
                                                        <span class="ico-product ico-new">New</span>
                                                    </div>
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/13.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action-bot">
                                                    <div class="wrap-addtocart">
                                                        <button class="btn-cart" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    </div>
                                                    <div class="actions">
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" title="Add to Wishlist"
                                                                    href="#">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" title="Add to Compare" href="#">
                                                                    <i class="fa fa-random"></i>
                                                                </a>
                                                            </li>
                                                            <li class="wrap-quickview" data-id="qv_item_7">
                                                                <div class="quickview-wrap">
                                                                    <a class="sns-btn-quickview qv_btn" href="#">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <form class="bot">
                                                        <input type="checkbox" name="vehicle" value="Bike">
                                                    </form>
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/3.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action-bot">
                                                    <div class="wrap-addtocart">
                                                        <button class="btn-cart" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    </div>
                                                    <div class="actions">
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" title="Add to Wishlist"
                                                                    href="#">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" title="Add to Compare" href="#">
                                                                    <i class="fa fa-random"></i>
                                                                </a>
                                                            </li>
                                                            <li class="wrap-quickview" data-id="qv_item_7">
                                                                <div class="quickview-wrap">
                                                                    <a class="sns-btn-quickview qv_btn" href="#">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <form class="bot">
                                                        <input type="checkbox" name="vehicle" value="Bike">
                                                    </form>
                                                    <div class="ico-label">
                                                        <span class="ico-product ico-new">New</span>
                                                    </div>
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/26.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action-bot">
                                                    <div class="wrap-addtocart">
                                                        <button class="btn-cart" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    </div>
                                                    <div class="actions">
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" title="Add to Wishlist"
                                                                    href="#">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" title="Add to Compare" href="#">
                                                                    <i class="fa fa-random"></i>
                                                                </a>
                                                            </li>
                                                            <li class="wrap-quickview" data-id="qv_item_7">
                                                                <div class="quickview-wrap">
                                                                    <a class="sns-btn-quickview qv_btn" href="#">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <form class="bot">
                                                        <input type="checkbox" name="vehicle" value="Bike">
                                                    </form>
                                                    <a class="product-image have-additional" href="index3-detail.html"
                                                        title="Modular Modern">
                                                        <span class="img-main">
                                                            <img alt="" src="images/products/29.jpg">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a href="index3-detail.html" title="Modular Modern"> Modular
                                                                Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action-bot">
                                                    <div class="wrap-addtocart">
                                                        <button class="btn-cart" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    </div>
                                                    <div class="actions">
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" title="Add to Wishlist"
                                                                    href="#">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" title="Add to Compare" href="#">
                                                                    <i class="fa fa-random"></i>
                                                                </a>
                                                            </li>
                                                            <li class="wrap-quickview" data-id="qv_item_7">
                                                                <div class="quickview-wrap">
                                                                    <a class="sns-btn-quickview qv_btn" href="#">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- AND CONTENT -->
@endsection