@extends('layouts.app',['title'=>"الطلبات السابقة"])
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p></p>
                        <h1>طلب رقم {{ $order->id }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <div class="container">
		<div class="cart-section mt-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="cart-table-wrap">
							<table class="cart-table">
								<thead class="cart-table-head ">
									<tr class="table-head-row">
										<th>تاريخ الطلب</th>
										<th>الحالة</th>
										<th>حالة الدفع</th>
										<th>عدد المنتجات</th>
										<th>اجمالى الطلب</th>
									</tr>
								</thead>
								<tbody>
                                    <tr>
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td>@lang('status.' . $order->status)</td>
                                        <td>{{ $order->payment_status ?? '-' }}</td>
                                        <td>{{ $order->products->count() }}</td>
                                        <td>{{ $order->total }}</td>
                                    </tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end cart -->
    </div>

    <div class="container">
		<div class="cart-section mt-10 mb-100">
			<div class="container">
				<div class="row">
                    
					<div class="col-md-12 my-4">
                        <div class="cart-table-wrap">
							<table class="cart-table">
								<thead class="cart-table-head ">
									<tr class="table-head-row">
										<th>#</th>
                                        <th>المنتج</th>
                                        <th>الوحدة </th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>الاجمالى</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $product->product->product->name }}</td>
                                            <td>{{ $product->product->unit->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity * $product->price }}</td>
                                        </tr>
                                    @endforeach
								</tbody>
							</table>
						</div>
                    </div>
				</div>
			</div>
		</div>
		<!-- end cart -->
    </div>
@endsection