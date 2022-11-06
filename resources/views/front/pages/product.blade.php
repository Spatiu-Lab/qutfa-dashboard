@extends('layouts.app',['title'=> $product->product->name])

@push('styles')
	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		-webkit-appearance: none;
			margin: 0;
		}
		/* Firefox */
		input[type=number] {
		-moz-appearance: textfield;
		}
	</style>
@endpush

@section('content')
		<!-- breadcrumb-section -->
		<div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<h1>{{ $product->product->name }}</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->
	
		<!-- single product -->
		<div class="single-product mt-150 mb-150">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="single-product-img">
							<img src="{{ asset($product->product->image()) }}" alt="{{ $product->product->name }}">
						</div>
					</div>
					<div class="col-md-7">
						<div class="single-product-content">
							<h3>{{ $product->product->name }}</h3>
							<p class="single-product-pricing">
								<span>{{ $product->unit->name }}</span> 
								<span class="discount {{  $product->discount_amount > 0 ? '' : 'd-none' }} ">{{  $product->price +  $product->discount_amount }}  ريال</span>
								{{ $product->price }} ريال
							</p>
							<p>
								{!! $product->product->description !!}
							</p>
							<div class="single-product-form">
								<form action="#">
									<input id="quantity" type="number" placeholder="1" min="1" value="1">
								</form>
								<button 
									type="button" 
									data-id="{{ $product->id }}"
									data-name="{{ $product->product->name }}"
									data-unit="{{ $product->unit->name }}"
									data-price="{{ $product->price }}"
									class="cart-btn"
									>
									<i class="fas fa-shopping-cart"></i>
									اضافة الى السلة
								</button>
								<p><strong>القسم: </strong>{{ $product->product->category->title }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end single product -->
	
		<!-- more products -->
		{{-- <div class="more-products mb-150">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 offset-lg-2 text-center">
						<div class="section-title">	
							<h3><span class="orange-text">Related</span> Products</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
							</div>
							<h3>Strawberry</h3>
							<p class="product-price"><span>Per Kg</span> 85$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
							</div>
							<h3>Berry</h3>
							<p class="product-price"><span>Per Kg</span> 70$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
							</div>
							<h3>Lemon</h3>
							<p class="product-price"><span>Per Kg</span> 35$ </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- end more products -->
@endsection

@push('scripts')
	<script>
		$('.cart-btn').on('click', function () {
			cartLS.add({
				id : $(this).data('id'),
				name : $(this).data('name'),
				price : $(this).data('price')
			}, Number($('#quantity').val()))
		})
	</script>
@endpush