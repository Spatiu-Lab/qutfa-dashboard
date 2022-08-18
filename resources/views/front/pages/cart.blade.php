@extends('layouts.app',['title'=>"السلة"])
@section('content')
		<!-- breadcrumb-section -->
		<div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<p></p>
							<h1>السلة</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->
	
		<!-- cart -->
		<div class="cart-section mt-150 mb-150">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12">
						<div class="cart-table-wrap">
							<table class="cart-table">
								<thead class="cart-table-head ">
									<tr class="table-head-row">
										<th class="product-remove"></th>
										{{-- <th class="product-image">صورة المنتج</th> --}}
										<th class="product-name">الاسم</th>
										<th class="product-price">السعر</th>
										<th class="product-quantity">الكمية</th>
										<th class="product-total">الاجمالي</th>
									</tr>
								</thead>
								<tbody class="cart">
									
								</tbody>
							</table>
						</div>
					</div>
	
					<div class="col-lg-4">
						<div class="total-section">
							<table class="total-table">
								<thead class="total-table-head">
									<tr class="table-total-row">
										<th>الاجمالي</th>
										<th>السعر</th>
									</tr>
								</thead>
								<tbody>
									<tr class="total-data">
										<td><strong>اجمالى الطلب: </strong></td>
										<td class="total"></td>
									</tr>
								</tbody>
							</table>
							<div class="cart-buttons">
								<!-- <a href="cart.html" class="boxed-btn">Update Cart</a> -->
								<a href="#" class="boxed-btn black">اكمال الطلب</a>
							</div>
						</div>
	
						<!-- <div class="coupon-section">
							<h3>Apply Coupon</h3>
							<div class="coupon-form-wrap">
								<form action="index.html">
									<p><input type="text" placeholder="Coupon"></p>
									<p><input type="submit" value="Apply"></p>
								</form>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		<!-- end cart -->
@endsection

@push('scripts')
	<script>
		function renderCart(items) {
			const $cart = document.querySelector(".cart")
			const $total = document.querySelector(".total")

			$cart.innerHTML = items.map((item) => `
					<tr class="table-body-row">
						<td class="product-remove">
							<button data-item="${item.id}" onClick="removeItem(event)">حذف</button>
						</td>
						<td class="product-name">${item.name}</td>
						<td class="product-price">${item.price}</td>
						<td class="product-quantity"><input data-id="${item.id}" id="product-quantity" type="number" placeholder="0" value="${item.quantity}"></td>
						<td class="product-total">${ Number(item.price) * Number(item.quantity) }</td>
					</tr>`).join("")
			$total.innerHTML = "$" + cartLS.total()
		}

		function removeItem(e) {
			cartLS.remove($(e.target).data('item'))
			$(e.target).parent().parent().remove();
			cartLS.onChange(renderCart)
		}

		$(document).on('keyup', '#product-quantity', function (e) {
			var item = $(e.target).data('id')
			cartLS.update(item,'quantity',$(e.target).val())
			cartLS.onChange(renderCart)
		})

		renderCart(cartLS.list())

		cartLS.onChange(renderCart)
	</script>
@endpush