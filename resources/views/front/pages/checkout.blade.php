@extends('layouts.app',['title'=>"اكمال الطلب"])
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

    <!-- check out section -->
        <div class="checkout-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-accordion-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        العنوان
                                    </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <div class="billing-address-form">
                                        <form id="products_form" action="{{ route('orders.store') }}" method="post">
                                            @csrf
                                            {{-- <p><input type="text" placeholder="Name"></p>
                                            <p><input type="email" placeholder="Email"></p>
                                            <p><input type="text" placeholder="Address"></p>
                                            <p><input type="tel" placeholder="Phone"></p> --}}
                                            <p><input type="number" name="phone"  placeholder="رقم الهاتف"></p>
                                            <p><textarea name="address" id="bill" cols="30" rows="10" placeholder="العنوان"></textarea></p>
                                            <button type="submit" class="boxed-btn">ارسال الطلب</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <!-- <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Shipping Address
                                    </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <div class="shipping-address-form">
                                        <p>Your shipping address form is here.</p>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Card Details
                                    </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <div class="card-details">
                                        <p>Your card details goes here.</p>
                                    </div>
                                    </div>
                                </div>
                                </div> -->
                            </div>

                        </div>
                    </div>
                    
                    {{-- <div class="col-lg-4">
                        <div class="order-details-wrap">
                            <table class="order-details">
                                <thead>
                                    <tr>
                                        <th>الطلب</th>
                                        <th>السعر</th>
                                    </tr>
                                </thead>
                                <tbody class="order-details-body">
                                    <tr>
                                        <td>Product</td>
                                        <td>Total</td>
                                    </tr>
                                    <tr>
                                        <td>Strawberry</td>
                                        <td>$85.00</td>
                                    </tr>
                                    <tr>
                                        <td>Berry</td>
                                        <td>$70.00</td>
                                    </tr>
                                    <tr>
                                        <td>Lemon</td>
                                        <td>$35.00</td>
                                    </tr>
                                </tbody>
                                <tbody class="checkout-details">
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>$190</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$50</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>$240</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    <!-- end check out section -->
@endsection

@push('scripts')
        <script>
            function renderCart(items) {
                items.forEach(item => {
                    var product = `
                        <input type="hidden" name="product_id[]" value="${item.id}">
                        <input type="hidden" name="price[]" value="${item.price}">
                        <input type="hidden" name="quantity[]" value="${Number(item.quantity)}">
                    `
                    $("#products_form").append(product)
                });
            }

            var total = `
                <input type="hidden" name="total" value="${cartLS.total()}">
            `
            $("#products_form").append(total)
            
            renderCart(cartLS.list())
        </script>
@endpush    