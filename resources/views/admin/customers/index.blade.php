@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	العملاء
				</div>
				<div class="col-12 col-lg-4 p-2">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('create', \App\Models\Customer::class)
						<a href="{{ route('admin.customers.print') }}?{{ request()->getQueryString() }}">
							<span class="btn btn-secondary"><span class="fas fa-print"></span> طباعة</span>
						</a>
					@endcan
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... ">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">
			
				
			
				<table class="table table-bordered  table-hover text-center">
					<thead>
						<tr>
							<th>#</th>
							<th>الاسم</th>
							<th>رقم الهاتف</th>
							<th>البريد</th>
							<th>تحكم</th>
						</tr>
					</thead>
					<tbody>
						@foreach($customers as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->phone}}</td>
							<td>{{$user->email}}</td>
							<td>
								{{-- @can('view',$user)
								<a href="{{route('admin.users.show',$user)}}">
								<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
									<span class="fas fa-search "></span> عرض
								</span>
								</a>
								@endif --}}

								@can('update',$user)
									<a href="{{route('admin.users.edit',$user)}}">
										<span class="btn  btn-outline-success btn-sm font-1 mx-1">
											<span class="fas fa-wrench "></span> تحكم
										</span>
									</a>
								@endif
								@can('delete',$user)
								<form method="POST" action="{{route('admin.customers.destroy',$user)}}" class="d-inline-block">@csrf @method("DELETE")
									<button class="btn  btn-outline-{{ $user->user->blocked == 1 ? 'danger' : 'success' }} btn-sm font-1 mx-1">
										<span class="fas fa-{{ $user->user->blocked == 1 ? 'times' : 'check' }} "></span> {{ $user->user->blocked == 1 ? 'الغاء التفعيل' : 'تفعيل' }}
									</button>
								</form>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$customers->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
