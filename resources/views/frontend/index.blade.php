@extends('frontend.layouts.app')
@section('content')
<!-- CONTENT -->
<div id="sns_content" class="wrap layout-m">
    <div class="container">
        @push('banner')
        <div id="sns_slideshows3">
            <div id="slishow_wrap12" class="sns-slideshow owl-carousel owl-theme owl-loaded">
                @foreach($banners as $banner)
                <div class="item">
                    <img src="{{ asset($banner->image) }}" alt="">
                </div>
                @endforeach
            </div>
        </div>
        @endpush
        <div class="row">
            <div id="sns_main" class="col-md-12 col-main">
                <div id="sns_mainmidle">
                    <div class="policy-page3">
                        <ul class="ca-menu">
                            <li class="col-md-3 col-sm-6">
                                <a href="#">
                                    <span class="ca-icon"><i class="fa fa-truck"></i></span>
                                    <div class="ca-content">
                                        <h2 class="ca-main">Freshipping</h2>
                                        <h3 class="ca-sub">Lorem Ipsum is simply dummy</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="col-md-3 col-sm-6 rsbd-no">
                                <a href="#">
                                    <span class="ca-icon" id="heart"><i class="fa fa-dollar"></i></span>
                                    <div class="ca-content">
                                        <h2 class="ca-main">money back</h2>
                                        <h3 class="ca-sub">Lorem Ipsum is simply dummy</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="col-md-3 col-sm-6">
                                <a href="#">
                                    <span class="ca-icon"><i class="fa fa-lock"></i></span>
                                    <div class="ca-content">
                                        <h2 class="ca-main">perfect security</h2>
                                        <h3 class="ca-sub">Lorem Ipsum is simply dummy</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="col-md-3 col-sm-6">
                                <a href="#">
                                    <span class="ca-icon"><i class="fa fa-support"></i></span>
                                    <div class="ca-content">
                                        <h2 class="ca-main">best support</h2>
                                        <h3 class="ca-sub">Lorem Ipsum is simply dummy</h3>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div id="sns_producttaps1" class="sns_producttaps_wraps">
                        <h3 class="precar">PRODUCT TABS</h3>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($categories as $index => $category)
                            <li role="presentation" class="{{ $index === 0 ? 'active' : '' }}">
                                <a href="#tab-{{ $category->id }}" aria-controls="tab-{{ $category->id }}" role="tab"
                                    data-toggle="tab">{{ strtoupper($category->name) }}</a>
                            </li>
                            @endforeach
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach($categories as $index => $category)
                            <div role="tabpanel" class="tab-pane{{ $index === 0 ? ' active' : '' }}"
                                id="tab-{{ $category->id }}">
                                <div class="products-grid row style_grid">
                                    @forelse($category->products as $product)
                                    <div class="item col-lg-2d4 col-md-3 col-sm-4 col-xs-6 col-phone-12">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <div class="ico-label">
                                                        @if($product->is_featured)
                                                        <span class="ico-product ico-new">Featured</span>
                                                        @endif
                                                    </div>
                                                    <a class="product-image have-additional"
                                                        title="{{ $product->name }}" href="{{ route('frontend.productDetails', $product->slug) }}">
                                                        <span class="img-main">
                                                            <img src="{{ asset( ($product->image ?? 'placeholder.jpg')) }}"
                                                                alt="{{ $product->name }}">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="{{ $product->name }}" href="{{ route('frontend.productDetails', $product->slug) }}">{{
                                                                Str::limit($product->name, 50) }}</a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">${{
                                                                            number_format($product->price, 2) }}</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action-bot">
                                                    @if(Auth::check())
                                                    <div class="wrap-addtocart">
                                                        @if($product->quantity > 0)
                                                        <form action="{{ route('cart.add', $product) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="qty" value="1">
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </form>
                                                        @else
                                                        <button class="btn-cart" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span>Out of Stock</span>a
                                                        </button>
                                                        @endif

                                                    </div>
                                                    <div class="actions">
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" href="#"
                                                                    title="Add to Wishlist">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" href="#" title="Add to Compare">
                                                                    <i class="fa fa-random"></i>
                                                                </a>
                                                            </li>
                                                            <li class="wrap-quickview"
                                                                data-id="qv_item_{{ $product->id }}">
                                                                <div class="quickview-wrap">
                                                                    <a class="sns-btn-quickview qv_btn" href="#">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12">
                                        <p class="text-center">No products available in this category.</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="sns_banner">
                    <a href="#">
                        <img src="images/banner11.jpg" alt="">
                    </a>
                    <div class="style-title">NEW products</div>
                    <div class="style-text1">Axel - stool</div>
                    <div class="style-text2">Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                        book. It has survived not only five centuries,</div>
                    <div class="style-button">Buy now</div>
                </div>
                <!--  <div class="clearfix"></div> -->


                <div class="sns-products-list">
                    <div class="row">
                        <div class="products-small" style="display: inline-block">
                            <div class="item-row col-md-4 col-sm-6 col-lg-4">
                                <h3>Featured</h3>
                                <div class="item-content">
                                    @foreach($featured as $feature)
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" title="Modular Modern"
                                                        href="{{ route('frontend.productDetails', $feature->slug) }}">
                                                        <span class="img-main">
                                                            <img src="{{ asset($feature->image) }}" alt="">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="Modular Modern" href="{{ route('frontend.productDetails', $feature->slug) }}">
                                                                {{ $feature->name }} </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">${{
                                                                            number_format($feature->price, 2) }}</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="item-row col-md-4 col-sm-6 col-lg-4">
                                <h3>Best sale</h3>
                                <div class="item-content">
                                    @foreach($topsellings as $topselling)

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" title="Modular Modern"
                                                        href="{{ route('frontend.productDetails', $topselling->slug) }}">
                                                        <span class="img-main">
                                                            <img src="{{asset($topselling->image)}}"
                                                                alt="{{ $topselling->name }}">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="Modular Modern" href="{{ route('frontend.productDetails', $topselling->slug) }}">
                                                                {{ $topselling->name }}
                                                            </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">${{
                                                                            number_format($topselling->price, 2)
                                                                            }}</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- <div class="item-row col-md-4 col-sm-6 col-lg-3">
                                <h3>Most viewed</h3>
                                <div class="item-content">
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional" title="Modular Modern"
                                                        href="index3-detail.html">
                                                        <span class="img-main">
                                                            <img src="images/products/15.jpg" alt="">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="Modular Modern" href="index3-detail.html">
                                                                Modular Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                    </span>
                                                                </span>
                                                            </div>
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
                                                    <a class="product-image have-additional" title="Modular Modern"
                                                        href="index3-detail.html">
                                                        <span class="img-main">
                                                            <img src="images/products/16.jpg" alt="">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="Modular Modern" href="index3-detail.html">
                                                                Modular Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                    </span>
                                                                </span>
                                                            </div>
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
                                                    <a class="product-image have-additional" title="Modular Modern"
                                                        href="index3-detail.html">
                                                        <span class="img-main">
                                                            <img src="images/products/28.jpg" alt="">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="Modular Modern" href="index3-detail.html">
                                                                Modular Modern </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="item-row col-md-4 col-sm-6 col-lg-4">
                                <h3>Top rate</h3>
                                <div class="item-content">
                                    @foreach($toprateds as $toprated)
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="prd">
                                                <div class="item-img clearfix">
                                                    <a class="product-image have-additional"
                                                        title="{{ $toprated->name }}" href="{{ route('frontend.productDetails', $toprated->slug) }}">
                                                        <span class="img-main">
                                                            <img src="{{asset($toprated->image)}}"
                                                                alt="{{ $toprated->name }}">
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="{{ $toprated->name }}" href="{{ route('frontend.productDetails', $toprated->slug) }}">
                                                                {{ $toprated->name }} </a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">${{
                                                                            number_format($toprated->price, 2) }}</span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
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
                </div>

                <div id="header-slideshow">
                    <div class="row">
                        <div class="slideshows col-md-6 col-sm-8">
                            <div id="slider123456">
                                <div class="item style1 banner5">
                                    <a href="#" class="banner22">
                                        <img src="images/sildeshow/slideshow1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="banner-right col-md-6 col-sm-4">
                            <div class="banner6 banner5 dbn col-md-12 col-sm-6">
                                <a href="#" class="banner22">
                                    <img src="images/sildeshow/banner1.jpg" alt="">
                                </a>
                            </div>
                            <div class="banner6 pdno col-md-12 col-sm-12">
                                <div class="banner7 banner6  banner5 col-md-6 col-sm-12">
                                    <a href="#" class="banner22">
                                        <img src="images/sildeshow/banner2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="banner8 banner6  banner5 col-md-6 col-sm-12">
                                    <a href="#" class="banner22">
                                        <img src="images/sildeshow/banner3.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="sns-latestblog">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-title">
                                <h3>LATEST POSTS</h3>
                            </div>
                        </div>
                        <div id="latestblog132" class="latestblog-content owl-carousel owl-theme"
                            style="display: inline-block">
                            <div class="item">
                                <div class="banner5">
                                    <a href="blog-detail.html" class="banner22">
                                        <img src="images/blog/blog5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-page">
                                    <div class="blog-left">
                                        <p class="text1">08</p>
                                        <p class="text2">JAN</p>
                                    </div>

                                    <div class="blog-right">
                                        <p class="style1"><a href="blog-detail.html">Chair furnitured</a></p>
                                        <p class="style2">Lorem Ipsum has been the industry's </p>
                                        <p class="style3">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="banner5">
                                    <a href="blog-detail.html" class="banner22">
                                        <img src="images/blog/blog6.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-page">
                                    <div class="blog-left">
                                        <p class="text1">06</p>
                                        <p class="text2">JAN</p>
                                    </div>

                                    <div class="blog-right">
                                        <p class="style1"><a href="blog-detail.html">Leather Sofas</a></p>
                                        <p class="style2">When an unknown printer took galley</p>
                                        <p class="style3">When an unknown printer took a galley of type and scrambled it
                                            to make a type specimen book. It has survived not only ...</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="banner5">
                                    <a href="blog-detail.html" class="banner22">
                                        <img src="images/blog/blog7.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-page">
                                    <div class="blog-left">
                                        <p class="text1">05</p>
                                        <p class="text2">JAN</p>
                                    </div>

                                    <div class="blog-right">
                                        <p class="style1"><a href="blog-detail.html">Chair furnitured</a></p>
                                        <p class="style2">Lorem Ipsum has been </p>
                                        <p class="style3">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry ...</p>
                                    </div>
                                </div>
                            </div>



                            <div class="item">
                                <div class="banner5">
                                    <a href="blog-detail.html" class="banner22">
                                        <img src="images/blog/blog5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-page">
                                    <div class="blog-left">
                                        <p class="text1">08</p>
                                        <p class="text2">JAN</p>
                                    </div>

                                    <div class="blog-right">
                                        <p class="style1"><a href="blog-detail.html">Chair furnitured</a></p>
                                        <p class="style2">Lorem Ipsum has been the industry's </p>
                                        <p class="style3">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="banner5">
                                    <a href="blog-detail.html" class="banner22">
                                        <img src="images/blog/blog6.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-page">
                                    <div class="blog-left">
                                        <p class="text1">06</p>
                                        <p class="text2">JAN</p>
                                    </div>

                                    <div class="blog-right">
                                        <p class="style1"><a href="blog-detail.html">Leather Sofas</a></p>
                                        <p class="style2">When an unknown printer took galley</p>
                                        <p class="style3">When an unknown printer took a galley of type and scrambled it
                                            to make a type specimen book. It has survived not only ...</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <a href="blog-detail.html" class="banner22">
                                    <img src="images/blog/blog7.jpg" alt="">
                                </a>
                                <div class="blog-page">
                                    <div class="blog-left">
                                        <p class="text1">05</p>
                                        <p class="text2">JAN</p>
                                    </div>

                                    <div class="blog-right">
                                        <p class="style1"><a href="blog-detail.html">Chair furnitured</a></p>
                                        <p class="style2">Lorem Ipsum has been </p>
                                        <p class="style3">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry ...</p>
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
</div>
<!-- AND CONTENT -->

<!-- PARTNERS -->
<div id="sns_partners" class="wrap">
    <div class="container">
        <div class="slider-wrap">
            <div class="partners_slider_in">
                <div id="partners_slider1" class="our_partners owl-carousel owl-theme owl-loaded"
                    style="display: inline-block">
                    <div class="item">
                        <a class="banner11" href="#" target="_blank">
                            <img alt="" src="images/brands/1.png">
                        </a>
                    </div>
                    <div class="item">
                        <a class="banner11" href="#" target="_blank">
                            <img alt="" src="images/brands/2.png">
                        </a>
                    </div>
                    <div class="item">
                        <a class="banner11" href="#" target="_blank">
                            <img alt="" src="images/brands/3.png">
                        </a>
                    </div>
                    <div class="item">
                        <a class="banner11" href="#" target="_blank">
                            <img alt="" src="images/brands/4.png">
                        </a>
                    </div>
                    <div class="item">
                        <a class="banner11" href="#" target="_blank">
                            <img alt="" src="images/brands/5.png">
                        </a>
                    </div>
                    <div class="item">
                        <a class="banner11" href="#" target="_blank">
                            <img alt="" src="images/brands/6.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- AND PARTNERS -->

<!-- FOOTER -->
@include('frontend.partials.footer')

<!-- AND FOOTER -->
</div>
@endsection