@extends('admin.layouts.master')
@section('title','Helper Info Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        হেল্পার ইনফর্মেশন পরিবর্তন
                        <a class="btn btn-success float-right mr-2" href="{{route('helper.create')}}">হেল্পার তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('helper.update',$helper->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								হেল্পার ইনফর্মেশন পরিবর্তন  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">নাম </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{$helper->name}}" required>
									<span class="invalid-feedback" role="alert">
										<strong>আপনার নাম অবশ্যই দিতে হবে </strong>
									</span>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">মোবাইল  নাম্বার</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="mobile" value="{{$helper->phone}}" required>
				
									<span class="invalid-feedback" role="alert">
										<strong>আপনার ফোন নাম্বার  অবশ্যই দিতে হবে </strong>
									</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">ন্যাশনাল  আইডি  নাম্বার</label>
								<div class="col-sm-6">
									<input type="text" class="form-control {{ $errors->has('national_id') ? ' is-invalid' : '' }}" name="national_id" id="national-id" value="{{$helper->national_id}}">
								</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label offset-md-1">ঠিকানা</label>
                                <div class="col-sm-6">
									<textarea name="address" id="" cols="5" rows="5" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  id="address" value="" required>{{$helper->address}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">ছবি</label>
								<div class="col-sm-6">
                                    <input type="text" value="{{$helper->image}}" hidden name="old_image">
                                    <input type="file" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="image" value="{{old('image')}}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                    @if($helper->image)
									<img src="{{asset('helpers/'.$helper->image)}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img>
									@else
									<img src="{{asset('helpers/dafault.png')}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img>
									@endif
								</div>
                            </div>

                            <div class="form-buttons-w text-center">
                                <button class="btn btn-primary" type="submit"> সেইভ করুন</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection