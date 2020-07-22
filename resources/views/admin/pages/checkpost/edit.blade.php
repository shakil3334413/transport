@extends('admin.layouts.master')
@section('title','Checkpost Info')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        চেকপোস্ট ইনফর্মেশন পরিবর্তন
                        <a class="btn btn-success float-right mr-2" href="{{route('checkpost.create')}}">চেকপোস্টের তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('checkpost.update',$checkpost->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								চেকপোস্ট ইনফর্মেশন পরিবর্তন  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">চেকপোস্টের নাম </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="চেক পোস্টের নাম" value="{{$checkpost->name}}" required>
									<span class="invalid-feedback" role="alert">
										<strong>চেকপোস্টের নাম অবশ্যই দিতে হবে </strong>
									</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">চেকপোস্টের ঠিকানা  </label>
                                <div class="col-sm-6">
                                <textarea name="address" id="address" cols="30" rows="10" placeholder="চেকপোস্টের ঠিকানা" class="form-control">{{$checkpost->address}}</textarea>
									
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