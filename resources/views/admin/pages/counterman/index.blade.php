@extends('admin.layouts.master')
@section('title','Counterman Info')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        কাউন্টারম্যান ইনফর্মেশন 
                        <a class="btn btn-success float-right mr-2" href="{{route('counterman.create')}}">কাউন্টারম্যান তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('counterman.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								কাউন্টারম্যান ইনফর্মেশন পূরণ করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">কাউন্টারম্যান নাম </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="নাম" value="{{old('name')}}" required>
									<span class="invalid-feedback" role="alert">
										<strong>নাম অবশ্যই দিতে হবে </strong>
									</span>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">মোবাইল  নাম্বার</label>
								<div class="col-sm-6">
                                	<input type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="mobile" placeholder="মোবাইল  নাম্বার " value="{{old('phone')}}" required>
									<span class="invalid-feedback" role="alert">
										<strong>ফোন নাম্বার  অবশ্যই দিতে হবে </strong>
									</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">ন্যাশনাল আইডি  নাম্বার</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" name="national_id" id="national-id" placeholder="ন্যাশনাল  আইডি  নাম্বার " value="{{old('national_id')}}">
								</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label offset-md-1">ঠিকানা</label>
                                <div class="col-sm-6">
									<textarea name="address" id="" cols="5" rows="5" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"  id="address" placeholder="ঠিকানা" required>{{old('address')}}</textarea>
									<span class="invalid-feedback" role="alert">
										<strong>ঠিকানা অবশ্যই দিতে হবে </strong>
									</span>
                                </div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">ছবি</label>
								<div class="col-sm-6">
                                    <input type="file" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="image" value="{{old('image')}}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
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