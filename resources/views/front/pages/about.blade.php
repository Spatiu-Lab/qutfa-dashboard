@extends('layouts.app',['title'=>"من نحن"])
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
		<!-- end search arewa -->
		
		<!-- breadcrumb-section -->
		<div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<p></p>
							<h1>نبذة عن قطفة</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->
	
		<!-- featured section -->
		<div class="feature-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="featured-text">
							<h2 class="pb-3">Why <span class="orange-text">Fruitkha</span></h2>
							<div class="row">
								<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
									<div class="list-box d-flex">
										<div class="list-icon">
											<i class="fas fa-shipping-fast"></i>
										</div>
										<div class="content">
											<h3>Home Delivery</h3>
											<p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
									<div class="list-box d-flex">
										<div class="list-icon">
											<i class="fas fa-money-bill-alt"></i>
										</div>
										<div class="content">
											<h3>Best Price</h3>
											<p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
									<div class="list-box d-flex">
										<div class="list-icon">
											<i class="fas fa-briefcase"></i>
										</div>
										<div class="content">
											<h3>Custom Box</h3>
											<p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="list-box d-flex">
										<div class="list-icon">
											<i class="fas fa-sync-alt"></i>
										</div>
										<div class="content">
											<h3>Quick Refund</h3>
											<p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end featured section -->
@endsection