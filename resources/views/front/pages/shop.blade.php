@extends('layouts.app',['title'=>" قسم "    . $category->title])
@section('content')
		<!-- breadcrumb-section -->
		<div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<h1>{{ $category->title }}</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->
	
		<!-- products -->
		<div class="product-section mt-150 mb-150">
			<div class="container">
				<div class="row product-lists">
					@foreach ($products as $product)
						<div class="col-lg-4 col-md-6 text-center strawberry">
							<div class="single-product-item">
								<div class="product-image">
									<a href="{{ url('product') . '/' . $product->id }}"><img src="{{ asset($product->product->image()) }}" alt=""></a>
								</div>
								<h3>{{ $product->product->name }}</h3>
								<p class="product-price">
									<span>{{ $product->unit->name }}</span> 
									<span class="discount {{  $product->discount_amount > 0 ? '' : 'd-none' }} ">{{  $product->price +  $product->discount_amount }}  ريال</span>
									{{ $product->price }} ريال
								</p>
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
							</div>
						</div>
					@endforeach
				</div>
				<div class="row">
					{{ $products->links() }}
				</div>
			</div>
		</div>
		<!-- end products -->
@endsection