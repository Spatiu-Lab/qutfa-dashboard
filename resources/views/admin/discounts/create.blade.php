@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.discounts.store')}}">
			@csrf
			<div class="col-12 col-lg-8 p-0 main-box">
				<div class="col-12 px-0">
					<div class="col-12 px-3 py-3">
						<span class="fas fa-info-circle"></span>	إضافة جديد
					</div>
					<div class="col-12 divider" style="min-height: 2px;"></div>
				</div>

				<div class="row">
					<div class="col-md-6 p-3 row">
						<div class="col-12 p-2">
							<div class="col-12">
								القسم
							</div>
							<div class="col-12 pt-3">
								<select name="category_id" required  class="form-control">		
									@foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->title }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 p-3 row">
						<div class="col-12 p-2">
							<div class="col-12">
								نسبة الخصم
							</div>
							<div class="col-12 pt-3">
								<input type="number" max="100" name="discount" required class="form-control"  >
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 p-3">
				<button class="btn btn-success" id="submitEvaluation">حفظ</button>
			</div> 
		</form>
	</div>
</div>
@endsection