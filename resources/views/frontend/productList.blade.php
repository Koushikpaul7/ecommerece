@extends('frontend.layouts.app')
@section('title', 'Product all')
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
							<li class="category3 last">
								<span>Funiture</span>
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
<div id="sns_content" class="wrap layout-lm">
	<div class="container">
		<div class="row">

			<!-- sns_left -->
			<div id="sns_left" class="col-md-3">
				<div class="wrap-in">
					<div class="block block-layered-nav block-layered-nav--no-filters">
						<div class="block-title">
							<strong>
								<span>Shop By</span>
							</strong>
						</div>
						<div class="block-content toggle-content">
							<dl id="narrow-by-list">


								<dt class="odd">Category</dt>
								<dd class="odd">
									<ol>
										<li>
											<a href="#">
												Sofas & Couches
												<span class="count">(12)</span>
											</a>
										</li>
										<li>
											<a href="#">
												Living Room Furniture
												<span class="count">(12)</span>
											</a>
										</li>
										<li>
											<a href="#">
												Television Stands
												<span class="count">(12)</span>
											</a>
										</li>
										<li>
											<a href="#">
												Bedroom Furniture
												<span class="count">(12)</span>
											</a>
										</li>
										<li>
											<a href="#">
												Coffee Tables
												<span class="count">(12)</span>
											</a>
										</li>
									</ol>
								</dd>

								<dt class="odd">Price</dt>
								<dd class="odd">
									<ol class="js-price">
										<li><input type="text" id="amount-1" readonly style="border:0; color:#666;"
												value="1250"></li>
										<li><input type="text" id="amount-2" readonly style="border:0; color:#666;"
												value="9999"></li>
										<li class="style3">FILLTER</li>
									</ol>
									<div id="slider-range"></div>
								</dd>
								<dt class="even">Manufacturer</dt>
								<dd class="even">
									<ol class="configurable-swatch-list last-child">
										<li>
											<a class="swatch-link" href="#">
												<span class="swatch-label"> Sofas & Couches </span>
												<span class="count">(12)</span>
											</a>
										</li>
										<li>
											<a class="swatch-link" href="#">
												<span class="swatch-label"> Living Room Furniture </span>
												<span class="count">(12)</span>
											</a>
										</li>
										<li>
											<a class="swatch-link" href="#">
												<span class="swatch-label"> Television Stands </span>
												<span class="count">(12)</span>
											</a>
										</li>
										<li>
											<a class="swatch-link" href="#">
												<span class="swatch-label"> Bedroom Furniture </span>
												<span class="count">(12)</span>
											</a>
										</li>
									</ol>
								</dd>
								<dt class="last odd">Color</dt>
								<dd class="last odd color-img">
									<ol class="configurable-swatch-list last-child">
										<li style="line-height: 19px;">
											<a class="swatch-link has-image" href="#">
												<span class="swatch-label" style="height:15px; width:15px;">
													<img width="15" height="15" title="Red" alt="Red"
														src="images/shopby/color1.jpg">
													<span>Red</span>
												</span>
												<span class="count">(12)</span>
											</a>
										</li>
										<li style="line-height: 19px;">
											<a class="swatch-link has-image" href="#">
												<span class="swatch-label" style="height:15px; width:15px;">
													<img width="15" height="15" title="Yellow" alt="Yellow"
														src="images/shopby/color2.jpg">
													<span>Yellow</span>
												</span>
												<span class="count">(12)</span>
											</a>
										</li>
										<li style="line-height: 19px;">
											<a class="swatch-link has-image" href="#">
												<span class="swatch-label" style="height:15px; width:15px;">
													<img width="15" height="15" title="Blue" alt="Blue"
														src="images/shopby/color3.jpg">
													<span>Blue</span>
												</span>
												<span class="count">(12)</span>
											</a>
										</li>
										<li style="line-height: 19px;">
											<a class="swatch-link has-image" href="#">
												<span class="swatch-label" style="height:15px; width:15px;">
													<img width="15" height="15" title="Green" alt="Green"
														src="images/shopby/color4.jpg">
													<span>Green</span>
												</span>
												<span class="count">(12)</span>
											</a>
										</li>
									</ol>
								</dd>
							</dl>
						</div>
					</div>
					<div class="block block_cat">
						<a class="banner5 banner22" href="#">
							<img src="images/banner_right.jpg" alt="">
						</a>
					</div>


					<div class="bestsale">
						<div class="title">
							<h3>RECOMMEND</h3>
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


				</div>
			</div>
			<!-- sns_left -->


			<div id="sns_main" class="col-md-9 col-main">
				<div id="sns_mainmidle">
					<div class="page-title category-title">
						<h1>Women</h1>
					</div>
					<div class="category-cms-block"></div>
					<p class="category-image banner5">
						<a href="#">
							<img src="images/banner-grid.jpg" alt="">
						</a>
					</p>

					<div class="category-products">

						<!-- toolbar clearfix -->

						<div class="toolbar clearfix">
							<div class="toolbar-inner">
								@if($products)
								<div class="pager">
									<p class="amount">
										<span>1 to 20 </span>
										{{ $products->total() }} Item(s)
									</p>

									<div class="pages">
										<strong>Pages:</strong>
										{{-- <ol>
											<li class="current">1</li>
											<li>
												<a href="#">2</a>
											</li>
											<li>
												<a href="#">3</a>
											</li>
											<li>
												<a class="next i-next" title="Next" href="#"> Next </a>
											</li>
										</ol> --}}
										{{ $products->links() }}
									</div>
									@endif
								</div>
							</div>
						</div>
						<!-- toolbar clearfix -->



						<!-- sns-products-container -->
						<div class="sns-products-container clearfix">
							<ol id="products-list" class="products-list clearfix">
								@foreach($products as $product)

								<li class="item odd">
									<div class="item-inner product_list_style">
										<div class="col-left">
											<div class="item-img">
												<div class="ico-label">
													@if($product->is_featured)<span class="ico-product ico-sale">
														Featured </span>@endif
												</div>
												<a class="product-image have-additional" title="{{ $product->name }}"
													href="{{ route('frontend.productDetails', $product->slug) }}">
													<span class="img-main">
														<img alt="{{ $product->name }}"
															src="{{ asset($product->image) }}">
													</span>
												</a>
											</div>
										</div>
										<div class="col-right">
											<div class="item-title">
												<a title="{{ $product->name }}"
													href="{{ route('frontend.productDetails', $product->slug) }}">{{
													$product->name }}</a>
											</div>
											<div class="item-price">
												<div class="price-box">
													<span class="regular-price">
														<span class="price">
															<span class="price1">${{ number_format($product->price, 2)
																}}</span>
														</span>
													</span>
												</div>
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
												<p>{{ $product->description }}</p>
											</div>
											@auth('web')
											<form action="{{ route('cart.add', $product) }}" method="POST">
												@csrf
												<div class="actions">
													 <input type="hidden" name="qty" value="1">
													<button type="submit" class="btn-cart" title="Add to Cart" data-id="qv_item_8">
														Add to Cart
													</button>
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
												</div>
											</form>
											@endauth
											@guest('web')
											<div class="alert alert-info">
												Please <a href="{{ route('user.login') }}">login</a> to add products to your
												cart.
											</div>
											@endguest
										</div>
									</div>
								</li>
								@endforeach

							</ol>
						</div>
						<!-- sns-products-container -->


						<!-- toolbar clearfix  bottom-->

						<div class="toolbar clearfix">
							<div class="toolbar-inner">
								<div class="pager">
									<p class="amount">
										<span>1 to 20 </span>
										123 item (s)
									</p>
									<div class="pages">
										<strong>Pages:</strong>
										{{-- <ol>
											<li class="current">1</li>
											<li>
												<a href="#">2</a>
											</li>
											<li>
												<a href="#">3</a>
											</li>
											<li>
												<a class="next i-next" title="Next" href="#"> Next </a>
											</li>
										</ol> --}}
										{{ $products->links() }}
									</div>
								</div>
							</div>
						</div>
						<!-- toolbar clearfix bottom -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- AND CONTENT -->


@endsection
