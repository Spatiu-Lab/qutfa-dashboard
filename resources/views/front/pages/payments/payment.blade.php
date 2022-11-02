@extends('layouts.app')


@push('styles')
	{{-- <style>
		li.deactive {
			display: none;
		}

		.mobile-nav a {
			display: inline;
			position: relative;
			color: #fff;
			padding: unset;
			font-weight: 500;
		}

		.mobile-nav ul {
			padding-top: 70px;
		}
		.page-header {
			background: linear-gradient(rgba(0, 0, 0, .1), rgba(0, 0, 0, .1)), url("{{ asset('website/img/carousel-1.jpg') }}") center center no-repeat;
		}
		.selected-service {
			background-color: #167ee9d6 !important;
			color: #fff;
			font-weight: bold;
		}

		#services .box {
			height: auto !important
		}

		.custom-input {
			border: 0;
			outline: unset;
			padding: 5px;
			width: 100%;
			transition: 200ms ease-in-out;
			box-shadow: 2px 1px 8px #167ee9d6;
			border-radius: 5px;
			color: #1c1b1bd1;
		}

		.custom-input:focus {
			border-color: #167ee9d6 ;
		}

		.btn-primary {
			background-color: #fff;
			color: #000000;
			border-color: #167ee9d6;
			outline: #167ee9d6;
		}

		btn-primary:hover {
			background-color: #167ee9d6;
		}

		.fit-image {
			width: 90% !important;
		}

		.payment-methods {
			direction: ltr;
			/* background-color: #fff; */
			padding: 5px;
			width: 100%;
			text-align: right;
		}

		.payment-images {
			display: none;
		}
		#services {
			padding: unset;
			margin-bottom: 5%
		}
		#services .box {
			padding: 8px;
			margin: unset;
		}

		.card-header {
			background-color: #167ee9d6;
			color: #fff;
			position: relative;
		}

        .wpwl-container {
            padding-top:18%; 
        }

		.card-header .overlay {
			width: 35%;
			position: absolute;
			background: #fff;
			height: 102%;
			float: ;
			top: 0px;
			left: 0;
			border-radius: 0px 30px 25px 0;
		}

		#services .icon {
			padding-top :10px;
			width : 50px;
		}

		.radio.selected{box-shadow: 0px 0px 0px 1px rgba(0, 0, 155, 0.4);border: 2px solid blue}.label-radio{font-weight: bold;color: #000000}
	</style>

	<style>
		body {
			position: relative;
			min-height: 115vh;
			background-color: #f5f8fd!important
		}
		.section-dark {
			position: absolute;
			bottom: 0;
			width: 100%;
		}

		.main-section {
			padding-top: 8%
		}

		@media (max-width: 574px) {
			body {
				min-height: 123vh;
			}
			.main-section {
				padding-top: 14%
			}

            .wpwl-container {
                padding: 44% 3%;
            }

			.mobile-nav-toggle {
				display: none !important
			}

			.service-navbar {
				display: block !important;
			}
			.main-nav a {
				font-size: 18px !important;
			}
		}
	</style>

	<style>
		* {
			direction: ltr;
		}

		.total-service {
			direction: rtl;
			text-align: right;
			margin-top: 11%;
		}

		table td {
			text-align: center
		}
	</style> --}}

	<style>
		.payment-container {
			direction: ltr;
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
						<p></p>
						<h1>اكمال الطلب</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- Service Start -->
	<div class="container-xxl py-5 payment-container">
		<div class="container">
			<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
				<h6 class="text-primary"></h6>
			</div>
			<div class="row ">
				{{-- <div class="col-md-6">
					<table class="table total-service" dir="rtl">
						<tbody>
							<tr class="text-center">
								<th colspan="2">معلومات الخدمة</th>
							</tr>
							<tr>
								<th>الاسم</th>
								<td>{{ $trackable['name'] }}</td>
							</tr>
							<tr>
								<th>رقم الهاتف</th>
								<td>{{ $trackable['phone'] }}</td>
							</tr>
							<tr>
								<th>الخدمة</th>
								<td>{{ $trackable['service'] }}</td>
							</tr>
							<tr>
								<th>المبلغ</th>
								<td>{{ number_format($trackable['price'], 2) }} ريال</td>
							</tr>
							<tr>
								<th>الضريبة</th>
								<td>{{ number_format($trackable['tax'], 2) }} ريال</td>
							</tr>
							<tr class="table-active">
								<th>الاجمالي</th>
								<td>{{ number_format($trackable['price'] + $trackable['tax'], 2) }} ريال</td>
							</tr>
						</tbody>
					</table>
				</div> --}}
				<div class="col-md-12">
					<form
					action="{{ $data->original['shopperResultUrl'] }}"
					class="paymentWidgets"
					data-brands="{{ $brand }}"
					>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Service End -->
@endsection

@push('scripts')
<script src="{{ $data->original['script_url'] }}"></script>
@endpush