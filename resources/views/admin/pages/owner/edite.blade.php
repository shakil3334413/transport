@extends('admin.layouts.master')
@section('title','Owner Info Edit')
@push('css')@endpush
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        মালিক  ইনফর্মেশন পরিবর্তন 
                        <a class="btn btn-success float-right mr-2" href="{{route('owner.create')}}">মালিকের তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('owner.update',$owners->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('put')
                            <h5 class="form-desc">
								মালিক  ইনফর্মেশন পরিবর্তন  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">নাম </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="validationTooltip01" placeholder="নাম" value="{{$owners->name}}" required>
									<span class="invalid-feedback" role="alert">
										<strong>আপনার নাম অবশ্যই দিতে হবে </strong>
									</span>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">মোবাইল  নাম্বার</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="phone" placeholder="মোবাইল  নাম্বার " value="{{$owners->phone}}" required>
									<span class="invalid-feedback" role="alert">
										<strong>আপনার মোবাইল  নাম্বার অবশ্যই দিতে হবে </strong>
									</span>
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="email">ইমেল</label>
								<div class="col-sm-6">
                                	<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="ইমেল" value="{{$owners->email}}" required>
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
									</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">ব্যাংক  নাম্বার(অপশনাল )</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="bank_number" id="bank-numbe" placeholder="ব্যাংক  নাম্বার(অপশনাল )" value="{{$owners->bank_number}}">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">ন্যাশনাল  আইডি  নাম্বার</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="national_id" id="national-id" placeholder="ন্যাশনাল  আইডি  নাম্বার " value="{{$owners->national_id}}">
								</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label offset-md-1">ঠিকানা</label>
                                <div class="col-sm-6">
									<textarea name="address" id="" cols="20" rows="7" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  id="address" placeholder="ঠিকানা" required>{{ $owners->address }}</textarea>
									<span class="invalid-feedback" role="alert">
										<strong>আপনার ঠিকানা  অবশ্যই দিতে হবে </strong>
									</span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">ছবি আপলোড করুন</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$owners->image}}" hidden name="old_image">
									<input type="file" name="image" id="image" class="form-control" value="{{$owners->image}}">
							    @if($owners->image)
                                    <img src="{{asset('owners/'.$owners->image)}}" class="img-thumbnail" style="width: 100px;height: 100px;"></img>
                                    @else
                                    <img src="{{asset('owners/dafault.png')}}" class="img-thumbnail" style="width: 100px;height: 100px;"></img>
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
