@extends('layouts.app', ['title' => 'الرئيسية'])

@section('content')
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle"></p>
								<h1>كل احتياجاتك في مكان واحد</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">تسوق الان</a>
									<a href="contact.html" class="bordered-btn">تواصل معنا</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle"></p>
								<h1>كل احتياجاتك في مكان واحد</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">تسوق الان</a>
									<a href="contact.html" class="bordered-btn">تواصل معنا</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle"></p>
								<h1>كل احتياجاتك في مكان واحد</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">تسوق الان</a>
									<a href="contact.html" class="bordered-btn">تواصل معنا</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>توصيل سريع</h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>تواصل 24/7 </h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>الاسترجاع</h3>
							<p></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-100 mb-150">
		<div class="container">
			<div class="star">
				<div class="text-right mb-3">	
					<h4><span class="orange-text">منتجات مميزة</span></h4>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-1.jpg" alt=""></a>
							</div>
							<h3>Strawberry</h3>
							<p class="product-price"><span>Per Kg</span> 85$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-2.jpg" alt=""></a>
							</div>
							<h3>Berry</h3>
							<p class="product-price"><span>Per Kg</span> 70$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-3.jpg" alt=""></a>
							</div>
							<h3>Lemon</h3>
							<p class="product-price"><span>Per Kg</span> 35$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-4.jpg" alt=""></a>
							</div>
							<h3>Lemon</h3>
							<p class="product-price"><span>Per Kg</span> 35$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
				</div>
			</div>
			<div class="star">
				<div class="mb-3">	
					<h4>
						<span class="orange-text d-inline-block float-right">احدث منتجات التمور</span>
						<span class="orange-text d-inline-block text-left">عرض الكل</span>
					</h4>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-1.jpg" alt=""></a>
							</div>
							<h3>Strawberry</h3>
							<p class="product-price"><span>Per Kg</span> 85$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-2.jpg" alt=""></a>
							</div>
							<h3>Berry</h3>
							<p class="product-price"><span>Per Kg</span> 70$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-3.jpg" alt=""></a>
							</div>
							<h3>Lemon</h3>
							<p class="product-price"><span>Per Kg</span> 35$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-4.jpg" alt=""></a>
							</div>
							<h3>Lemon</h3>
							<p class="product-price"><span>Per Kg</span> 35$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
				</div>
			</div>
			<div class="star">
				<div class="mb-3">	
					<h4>
						<span class="orange-text d-inline-block float-right">احدث منتجات الفواكه</span>
						<span class="orange-text d-inline-block text-left">عرض الكل</span>
					</h4>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-1.jpg" alt=""></a>
							</div>
							<h3>Strawberry</h3>
							<p class="product-price"><span>Per Kg</span> 85$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-2.jpg" alt=""></a>
							</div>
							<h3>Berry</h3>
							<p class="product-price"><span>Per Kg</span> 70$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-3.jpg" alt=""></a>
							</div>
							<h3>Lemon</h3>
							<p class="product-price"><span>Per Kg</span> 35$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-4.jpg" alt=""></a>
							</div>
							<h3>Lemon</h3>
							<p class="product-price"><span>Per Kg</span> 35$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
				</div>
			</div>
			<div class="star">
				<div class="mb-3">	
					<h4>
						<span class="orange-text d-inline-block float-right">احدث منتجات الخضروات</span>
						<span class="orange-text d-inline-block text-left">عرض الكل</span>
					</h4>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-1.jpg" alt=""></a>
							</div>
							<h3>Strawberry</h3>
							<p class="product-price"><span>Per Kg</span> 85$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-2.jpg" alt=""></a>
							</div>
							<h3>Berry</h3>
							<p class="product-price"><span>Per Kg</span> 70$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-3.jpg" alt=""></a>
							</div>
							<h3>Lemon</h3>
							<p class="product-price"><span>Per Kg</span> 35$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('front') }}/assets/img/products/product-img-4.jpg" alt=""></a>
							</div>
							<h3>Lemon</h3>
							<p class="product-price"><span>Per Kg</span> 35$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product section -->
@endsection