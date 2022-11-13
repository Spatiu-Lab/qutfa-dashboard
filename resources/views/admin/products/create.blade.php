@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.products.store') }}">
                @csrf

                <div class="row">
                    <div class="col-12 col-lg-6 p-0 main-box">
                        <div class="col-12 px-0">
                            <div class="col-12 px-3 py-3">
                                <span class="fas fa-info-circle"></span> إضافة جديد
                            </div>
                            <div class="col-12 divider" style="min-height: 2px;"></div>
                        </div>
                        
                            <div class="col-12 p-3 row">
                                @foreach(config('translatable.locales') as $key)
                                    <div class="col-12 col-lg-6 p-2">
                                        <div class="col-12">
                                            الاسم {{__('lang.' . $key)}}
                                        </div>
                                        <div class="col-12 pt-3">
                                            <input type="text" name="name[{{$key}}]" required maxlength="190" class="form-control"
                                                value="{{ old('name[' . $key .']') }}">
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-12 col-lg-6 p-2">
                                    <div class="col-12">
                                        الصورة
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="file" name="image" class="form-control" accept="image/*" required>
                                    </div>
                                    <div class="col-12 pt-3">

                                    </div>
                                </div>


                                <div class="col-12 col-lg-6 p-2">
                                    <div class="col-12">
                                        القسم الرئيسي
                                    </div>
                                    {{-- onchange="getSubCategories(this.value)" --}}
                                    <div class="col-12 pt-3">
                                        <select name="category_id" class="form-control" id="category">
                                            <option value="">القسم </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
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
                                        <textarea name="description" class="editor with-file-explorer" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="col-12 col-lg-12 main-box">
                            <div class="col-12 px-0">
                                <div class="col-12 px-3 py-3">
                                    <span class="fas fa-info-circle"></span> الوحدات
                                </div>
                                <div class="col-12 divider" style="min-height: 2px;"></div>
                                <div class="col-12 p-3 row units">
									<div class="unit row">
										<div class="col-12 col-lg-4 p-2">
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
										<div class="col-12 col-lg-4 p-2">
											<div class="col-12">
												السعر
											</div>
											<div class="col-12 pt-3">
												<input type="number" required name="prices[]" step="0.1" class="form-control" >
											</div>
										</div>
                                        <div class="col-12 col-lg-4 p-2">
											<div class="col-12">
												التخفيض
											</div>
											<div class="col-12 pt-3">
												<input type="number" required name="discount[]" step="1" max="100" class="form-control" value="0">
											</div>
										</div>
									</div>
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
        function getSubCategories(id) {
            $.ajax({
                url: "{{ url('admin/sub-categories/ajax') }}" + "/" + id,
                success: function(data) {
                    $('#sub-categories').html('')
                    data.forEach(category => {
                        console.log(category.title);
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
					<div class="col-12 col-lg-4 p-2">
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
					<div class="col-12 col-lg-3 p-2">
						<div class="col-12">
							السعر
						</div>
						<div class="col-12 pt-3">
							<input type="number" name="prices[]" step="0.1" class="form-control" required>
						</div>
					</div>
                    <div class="col-12 col-lg-3 p-2">
                        <div class="col-12">
                            التخفيض
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" required name="discount[]" step="1" max="100" class="form-control" value="0">
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
