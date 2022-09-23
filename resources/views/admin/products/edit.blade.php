@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">


		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.products.update',$product)}}">
		@csrf
		@method("PUT")

		<div class="row">
			<div class="col-12 col-lg-8 p-0 main-box">
				<div class="col-12 px-0">
					<div class="col-12 px-3 py-3">
						<span class="fas fa-info-circle"></span> إضافة جديد
					</div>
					<div class="col-12 divider" style="min-height: 2px;"></div>
				</div>
				<div class="col-12 p-3 row">
					<div class="col-12 col-lg-6 p-2">
						<div class="col-12">
							الاسم
						</div>
						<div class="col-12 pt-3">
							<input type="text" name="name" required maxlength="190" class="form-control"
								value="{{ $product->name }}">
						</div>
					</div>

					<div class="col-12 col-lg-6 p-2">
						<div class="col-12">
							الصورة
						</div>
						<div class="col-12 pt-3">
							<input type="file" name="image" class="form-control" accept="image/*">
						</div>
						<div class="col-12 pt-3">

						</div>
					</div>


					<div class="col-12 col-lg-6 p-2">
						<div class="col-12">
							القسم الرئيسي
						</div>
						<div class="col-12 pt-3">
							<select class="form-control" id="category" onchange="getSubCategories(this.value)" name="category_id">
								<option value="">القسم الرئيسي</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }} >  {{ $category->title }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-12 pt-3">

						</div>
					</div>

					{{-- <div class="col-12 col-lg-6 p-2">
						<div class="col-12">
							القسم الفرعي
						</div>
						<div class="col-12 pt-3">
							<select name="category_id" class="form-control" id="sub-categories"></select>
						</div>
					</div> --}}

					<div class="col-12 p-2">
						<div class="col-12">
							الحالة
						</div>
						<div class="col-12 pt-3">
							<select name="status" id="" class="form-control">
								@foreach ($status as $stat)
									<option value="{{ $stat }}">{{ __('status.' . $stat) }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-12  p-2">
						<div class="col-12">
							الوصف
						</div>
						<div class="col-12 pt-3">
							<textarea name="description" class="editor with-file-explorer">{{ $product->description }}</textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="col-12 col-lg-12 main-box">
					<div class="col-12 px-0">
						<div class="col-12 px-3 py-3">
							<span class="fas fa-info-circle"></span> الوحدات
						</div>
						<div class="col-12 divider" style="min-height: 2px;"></div>
						<div class="col-12 p-3 row units">
							@foreach ($product->units as $product_unit)
								<input type="hidden" name="product_unit_ids[]" value="{{ $product_unit->id }}">
								<div class="unit row">
									<div class="col-12 col-lg-5 p-2">
										<div class="col-12">
											الوحدة
										</div>
										<div class="col-12 pt-3">
											<select class="form-control" name="units[]">
												@foreach ($units as $unit)
													<option value="{{ $unit->id }}" {{ $unit->id == $product_unit->unit_id ? 'selected' : '' }}>{{ $unit->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-12 col-lg-5 p-2">
										<div class="col-12">
											السعر
										</div>
										<div class="col-12 pt-3">
											<input type="number" name="prices[]" step="0.1" class="form-control" value="{{ $product_unit->price }}">
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					<div class="col-12 p-3">
						<button type="button" class="btn btn-primary" onclick="addUnit()">اضافة وحدة</button>
					</div>
				</div>
			</div>
			<div class="col-12 p-3">
				<button class="btn btn-success" id="submitEvaluation">حفظ</button>
			</div>
		</div>
		</form>
	</div>
</div>
@endsection

@push('scripts')
	<script>

		$(function () {
			var category = $("#category").val()
			getSubCategories(category);
		})

		function getSubCategories(id) {
			$.ajax({
				url: "{{ url('admin/sub-categories/ajax') }}" + "/" + id,
				success: function(data) {
					$('#sub-categories').html('')
					data.forEach(category => {
						var option = `
							<option value="` + category.id + `">` + category.title + `</option>
						`

						$('#sub-categories').append(option)
					});
				}
			});
		}

		function addUnit() {
			var unit = `
				<div class="unit row">
					<div class="col-12 col-lg-5 p-2">
						<div class="col-12">
							الوحدة
						</div>
						<div class="col-12 pt-3">
							<select class="form-control" name="units[]">
								@foreach ($units as $unit)
									<option value="{{ $unit->id }}">{{ $unit->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-12 col-lg-5 p-2">
						<div class="col-12">
							السعر
						</div>
						<div class="col-12 pt-3">
							<input type="number" name="prices[]" step="0.1" class="form-control">
						</div>
					</div>
					<div class="col-12 col-lg-2 p-2">
						<div class="col-12">
							حدف
						</div>
						<div class="col-12 pt-3">
							<button type="button" class="btn btn-danger" onclick="deleteUnit(this)">
								<i class="fa fa-trash"></i>
							</button>
						</div>
					</div>
				</div>
			`
			$('.units').append(unit)
		}

		function deleteUnit (element) {
			$(element).parent().parent().parent().remove()
		}
	</script>
@endpush
