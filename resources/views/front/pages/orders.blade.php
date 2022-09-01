@extends('layouts.app',['title'=>"الطلبات السابقة"])
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p></p>
                        <h1>الطلبات السابقة</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <div class="container">
		<div class="cart-section mt-150 mb-150">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="cart-table-wrap">
							<table class="cart-table">
								<thead class="cart-table-head ">
									<tr class="table-head-row">
										<th>#</th>
										<th>تاريخ الطلب</th>
										<th>الحالة</th>
										<th>عدد المنتجات</th>
										<th>اجمالى الطلب</th>
                                        <th></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td>@lang('status.' . $order->status)</td>
                                            <td>{{ $order->products->count() }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>
                                                <a href="{{ route('orders.show', $order) }}">
                                                    <span class="btn  btn-outline-info btn-sm font-1 mx-1">
                                                        <span class="fas fa-eye "></span> عرض
                                                    </span>
                                                </a>
                                            </td>
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