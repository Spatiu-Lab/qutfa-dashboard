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
		@foreach ($sliders as $slider)
			<div class="single-homepage-slider" style="background-image: url({{ $slider->image() }});">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1 text-right">
							<div class="hero-text">
								<div class="hero-text-tablecell">
									<p class="subtitle"></p>
									<h1>{{ $slider->title }}</h1>
									<div class="hero-btns">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
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
			@foreach ($categories as $category)
				<div class="star">
					<div class="mb-3">	
						<h4>
							<span class="orange-text d-inline-block float-right">احدث منتجات {{ $category->title }}</span>
							<a href="{{ url('/shop') . '/' . $category->slug }}" class="orange-text d-inline-block text-left">عرض الكل</a>
						</h4>
					</div>
					<div class="row">
						@foreach ($category->products->take(4) as $product)
							<div class="col-lg-3 col-md-6 text-center">
								<div class="single-product-item">
									<div class="product-image">
										<a href="{{ url('/product') . '/'. $product->units->first()->id }}"><img src="{{ asset($product->image()) }}" alt=""></a>
									</div>
									<h3>{{ $product->name }}</h3>
									<p class="product-price">
										<span>{{ $product->units->first()->unit->name }}</span> 
										<span class="discount {{ $product->units->first()->discount_amount > 0 ? '' : 'd-none' }} ">{{ $product->units->first()->price + $product->units->first()->discount_amount }} ريال</span>
										{{ $product->units->first()->price }} ريال
									</p>
									<button 
										type="button" 
										data-id="{{ $product->units->first()->id }}"
										data-name="{{ $product->name }}"
										data-unit="{{ $product->units->first()->unit->name }}"
										data-price="{{ $product->units->first()->price }}"
										class="cart-btn"
										>
										<i class="fas fa-shopping-cart"></i>
										اضافة الى السلة
								</button>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<!-- end product section -->
@endsection