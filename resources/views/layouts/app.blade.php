<!DOCTYPE html>
<html lang="ar">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">

	<!-- title -->
	<title>{{ env('APP_NAME') }} {{ isset($title) ? '- ' . $title : '' }}</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('front') }}/assets/img/logo.png">
	<!-- google font -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> -->
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/all.min.css') }}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('front/assets/bootstrap/css/bootstrap.min.css') }}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.css') }}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/animate.css') }}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/meanmenu.min.css') }}">
	<!-- main style -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">
	<!-- rtl -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/rtl.css') }}">
	@stack('styles')
</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{ url('/') }}">
								<img class="logo" src="{{ asset('front') }}/assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item">
									<a href="{{ url('/') }}">الرئيسية</a>
								</li>
								<li><a href="{{ url('about') }}">نبذة عننا</a></li>
								@isset($nav_categories)
									<li><a href="#">الاقسام</a>
										<ul class="sub-menu">
											@foreach($nav_categories as $nav_category)
												<li><a href="{{ url('shop') . '/' . $nav_category->slug }}">{{ $nav_category->title }}</a></li>
											@endforeach
										</ul>
									</li>
								@endisset
								<li><a href="{{ url('/contact') }}">تواصل معنا</a></li>
								@auth
									<li><a href="{{ url('/orders') }}">الطلبات</a></li>
									<li><a href="#" onclick="document.getElementById('logout-form').submit();">تسجيل خروج</a></li>
								@else
									<li><a href="{{ url('/login') }}">دخول</a></li>
								@endauth
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{ url('/cart') }}">
											<i class="fas fa-shopping-cart"></i>
											<i class="badge badge-danger cart-counter">0</i>
										</a>
										<!-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
									</div>
								</li>
								<form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">@csrf</form>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->


    @yield('content')



    <!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2022 - qutfa  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="{{ asset('front/assets/js/jquery-1.11.3.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('front/assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- count down -->
	<script src="{{ asset('front/assets/js/jquery.countdown.js') }}"></script>
	<!-- isotope -->
	<script src="{{ asset('front/assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
	<!-- waypoints -->
	<script src="{{ asset('front/assets/js/waypoints.js') }}"></script>
	<!-- owl carousel -->
	<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
	<!-- magnific popup -->
	<script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
	<!-- mean menu -->
	<script src="{{ asset('front/assets/js/jquery.meanmenu.min.js') }}"></script>
	<!-- sticker js -->
	<script src="{{ asset('front/assets/js/sticker.js') }}"></script>
	<!-- cart-localstorage js -->
	<script src="{{ asset('front/assets/js/cart-localstorage.min.js') }}"></script>
	<!-- main js -->
	<script src="{{ asset('front/assets/js/main.js') }}"></script>

	<script>
		$('.cart-btn').on('click', function () {
			cartLS.add({
				id : $(this).data('id'),
				name : {
					'name' : $(this).data('name'),
					'unit' : $(this).data('unit'),
				},
				price : $(this).data('price')
			})
			$('.cart-counter').text(Object.keys(cartLS.list()).length)
		})

		$(function () {
			$('.cart-counter').text(Object.keys(cartLS.list()).length)
		})
	</script>
	{{-- @yield('scripts') --}}
	@stack('scripts')
</body>
</html>