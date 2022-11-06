@extends('layouts.app',['title'=>"اكمال الطلب"])

@push('styles')
    <style>
        .order-details {
            width: 100%;
        }

        .radio {
			box-shadow: 1px 14px 10px #eee;
			text-align: center;
			padding: 30px 0;
			border-radius: 10px;
		}

		.radio p {
			padding: 0;
			margin: 3.5px 0;
			color: #223469
		}
		.radio.selected {
			box-shadow: 0px 0px 0px 1px rgba(0, 0, 155, 0.4);
			border: 2px solid #bf1c2e
		}
		.label-radio {
			font-weight:bold;
			color: #bf1c2e
		}

        .hint {
            text-align: right !important;
            font-size: 14px;
            font-weight: bold;

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
                                    <button class="btn btn-link text-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        بيانات الفوترة
                                    </button>
                                    </h5>
                                </div>
                                <form id="products_form" action="{{ route('payment') }}" method="post">
                                    @csrf
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="billing-address-form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class=" m-auto">
                                                            <div class="form-group">
                                                                <input maxlength="200" type="text" autocomplete="off" required="required" name="city" class="form-control" placeholder="المدينة">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="phone"  placeholder="رقم الهاتف" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text"  name="street1" id="bill" class="form-control" placeholder="العنوان">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card single-accordion">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                            <button class="btn btn-link collapsed text-right" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                طريقة الدفع
                                            </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shipping-address-form">
                                                    <div class="row justify-content-center mb-4 radio-group ">
                                                        <input type="hidden" id="input-method" name="method" value="MADA">
                                                        <div class="col-sm-3 col-md-3 col-xs-6 col" style="padding: 2% 10px">
                                                            <div class='radio mx-auto selected' data-value="MADA">
                                                                <img class="fit-image" src="{{ asset('mada.jpeg')	}}" width="105px" height="55px"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-xs-6 col" style="padding: 2% 10px">
                                                            <div class='radio mx-auto' data-value="VISA MASTER">
                                                                <img class="fit-image" src="{{ asset('visa.png')	}}" width="105px" height="55px">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-xs-6 col " style="padding: 2% 10px">
                                                            <div class='radio mx-auto ' data-value="VISA MASTER">
                                                                <img class="fit-image" src="{{ asset('master.png')	}}" width="105px" height="55px"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-xs-6 col " style="padding: 2% 10px">
                                                            <div class='radio mx-auto text-center  offline' data-value="offline">
                                                                <i class="fa fa-truck" width="105px" height="55px"></i>
                                                                <p>دفع عند الاستلام</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <ul>
                                                            <li class="hint d-none"><p>سيتم اضافة 10 ريال رسوم تحصيل</p></li>
                                                        </ul>
                                                    </div>
                                                    <button id="btn-submit" type="submit" class="boxed-btn">ارسال الطلب</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                {{-- <div class="card single-accordion">
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
                                </div>  --}}
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="order-details-wrap">
                            <table class="table order-details">
                                <tbody class="order-details-body text-right">
                                    <tr>
                                        <th colspan="2" class="text-center">محتويات السلة</th>
                                    </tr>
                                    <tr>
                                        <th>المنتجات</th>
                                        <td class="text-center products"></td>
                                    </tr>
                                    <tr>
                                        <th>اجمالى السلة</th>
                                        <td class="text-center amount"></td>
                                    </tr>
                                    <tr>
                                        <th>الضريبة</th>
                                        <td class="text-center tax"></td>
                                    </tr>
                                    <tr class=" active">
                                        <th>الاجمالى</th>
                                        <td class="text-center total"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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

                var total = `
                    <input type="hidden" name="total" value="${cartLS.total()}">
                `
                $("#products_form").append(total);
            }


            $(function () {
                $('.products').text(cartLS.list().length )
                $('.amount').text(cartLS.total() - ((cartLS.total() * 15/100)) + "  ريال")
                $('.tax').text((cartLS.total() * 15/100) + "  ريال" )
                $('.total').text(cartLS.total() + "  ريال")
            })

            // Radio button
			$(document).on('click', '.radio-group .radio',function(){
                $('#input-method').val($(this).data('value'))
                $(this).parent().parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
                $('#payment_delivery').removeAttr('checked')

                if($(this).data('value') == "offline") {
                    $('.hint').removeClass('d-none')
                }else {
                    $('.hint').addClass('d-none')
                }
            })
            

            $('#btn-submit').on('click',function (e) {
                e.preventDefault()
                renderCart(cartLS.list())
                cartLS.destroy()
                $('#products_form').submit()
            })
            
        </script>
@endpush    