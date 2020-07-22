@extends('admin.layouts.master')
@section('title','Owner Advance Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        মালিকের অগ্রীম টাকার ইনফর্মেশন
                        <a class="btn btn-success float-right mr-2" href="{{route('owneradvance.index')}}">মালিকের অগ্রীম টাকার তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('owneradvance.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								মালিকের অগ্রীম টাকার ইনফর্মেশন পূরণ  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">মালিকের নাম </label>
                                <div class="col-sm-6">
                                    <select name="owner_id" id="owner_id" class="form-control">
										@foreach($owner as $owners)
											<option value="{{$owners->id}}">{{$owners->name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">কাউন্টারের নাম</label>
								<div class="col-sm-6">
									<select name="counter_id" id="counter_id" class="form-control">
										@foreach($counter as $counters)
											<option value="{{$counters->id}}">{{$counters->name}}</option>
										@endforeach
									</select>
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">টাকা নেওয়া অ্যান্ড দেয়ার তারিখ</label>
								<div class="col-sm-6">
                                    <input type="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" placeholder="" name="date">
                                    <span class="invalid-feedback" role="alert">
										<strong>তারিখ অবশ্যই দিতে হবে </strong>
									</span>
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">টাকা  নিবে /দিবে </label>
								<div class="col-sm-6">
                                    <select name="choice" id="" class="form-control{{ $errors->has('choice') ? ' is-invalid' : '' }}">
                                        <option value="">Select Your Option</option>
                                        <option value="1">নিবে</option>
                                        <option value="0">দিবে</option>
                                    </select>
                                    <span class="invalid-feedback" role="alert">
										<strong>অবশ্যই দিতে হবে </strong>
									</span>
								</div>
                            </div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">টাকার পরিমাপ</label>
								<div class="col-sm-6">
									<input type="text" class="form-control{{ $errors->has('taka') ? ' is-invalid' : '' }}" name="taka" id="taka" placeholder="টাকার পরিমাপ" required>
									<span class="invalid-feedback" role="alert">
										<strong>টাকার পরিমাপ অবশ্যই দিতে হবে </strong>
									</span>
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
