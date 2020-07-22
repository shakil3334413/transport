@extends('admin.layouts.master')
@section('title','Today Checkpost Info')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        চেকপোস্ট ইনফর্মেশন 
                        <a class="btn btn-success float-right mr-2" href="{{route('checkpost-info')}}">চেকপোস্টের তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('checkpost.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								চেকপোস্ট ইনফর্মেশন পূরণ  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">চেকপোস্টের নাম </label>
                                <div class="col-sm-6">
                                    <select name="name" id="name" class="form-control">
										<option value="">সিলেক্ট চেক পোস্ট</option>
										<option value="">চেক পোস্ট-1</option>
										<option value="">চেক পোস্ট-2</option>
										<option value="">চেক পোস্ট-3</option>
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">গাডির নাম্বার </label>
                                <div class="col-sm-6">
                                    <input type="text" name="car_number" placeholder="গাডির নাম্বার" class="form-control" id="car_number">
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">চেকারের নাম </label>
                                <div class="col-sm-6">
                                    <select name="checker_name" id="checker_name" class="form-control">
										<option value="">নাম সিলেক্ট করুন</option>
										<option value="">চেকার-1</option>
										<option value="">চেকার-2</option>
										<option value="">চেকার-3</option>
									</select>
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