@extends('admin.layouts.master')
@section('title','Owner Advance Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        মালিকের অগ্রীম টাকার ইনফর্মেশন পরিবর্তন করুন
                        <a class="btn btn-success float-right mr-2" href="{{route('owneradvance.index')}}">মালিকের অগ্রীম টাকার তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('owneradvance.update',$owneradvace->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								মালিকের অগ্রীম টাকার ইনফর্মেশন পরিবর্তন  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">মালিকের নাম </label>
                                <div class="col-sm-6">
                                    <select name="owner_id" id="owner_id" class="form-control">
										@foreach($owner as $owners)
											<option value="{{$owners->id}}" {{$owneradvace->owner->id == $owneradvace->owner_id? 'selected' : '' }} >{{$owners->name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">কাউন্টারের নাম</label>
								<div class="col-sm-6">
									<select name="counter_id" id="counter_id" class="form-control">
										@foreach($counter as $counters)
											<option value="{{$counters->id}}" {{$owneradvace->counter->id == $owneradvace->counter_id? 'selected' : '' }}>{{ $counters->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">টাকার পরিমাপ</label>
								<div class="col-sm-6">
								<input type="text" class="form-control{{ $errors->has('taka') ? ' is-invalid' : '' }}" name="taka" id="taka" placeholder="টাকার পরিমাপ" required value="{{$owneradvace->taka}}">
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
