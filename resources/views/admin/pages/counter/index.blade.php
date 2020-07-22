@extends('admin.layouts.master')
@section('title','Counter Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        কাউন্টার  ইনফর্মেশন 
                        <a class="btn btn-success float-right mr-2" href="{{route('counter.index')}}">কাউন্টার তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('counter.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								কাউন্টার  ইনফর্মেশন পূরণ  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">কাউন্টারের নাম*</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }} " name="name" id="name" placeholder="কাউন্টার নাম" required value="{{old('name')}}">
									<span class="invalid-feedback" role="alert">
										<strong>কাউন্টার  নাম অবশ্যই দিতে হবে </strong>
									</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">কাউন্টারের ঠিকানা  </label>
                                <div class="col-sm-6">
                                <textarea name="address" id="address" cols="30" rows="10" placeholder="কাউন্টার ঠিকানা" class="form-control">{{old('address')}}</textarea>
									
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