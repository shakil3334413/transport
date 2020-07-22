@extends('admin.layouts.master')
@section('title','Message Send')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        এস.এম.এস এর জন্য মালিক এর ইনফরমেশন সিলেক্ট করুন
                    </h6>
                    <div class="element-box">
                        <form action="{{route('sms.smsstore')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								এস.এম.এস এর জন্য মালিক এর ইনফরমেশন সিলেক্ট করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">মোবাইল নাম্বার</label>
                                <div class="col-sm-5">
                                    <select name="phone_number" id="phone_number" class="form-control">
                                        @foreach($owner as $owners)
                                            <option value="{{$owners->phone}}">{{$owners->phone}}&nbsp;->{{$owners->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">গাডির নাম্বার</label>
								<div class="col-sm-5">
                                	<select name="bus_number" id="bus_number" class="form-control">
                                        @foreach($ownerBus as $ownerBuses)
                                            <option value="{{$ownerBuses->bus_number}}">{{$ownerBuses->bus_number}}</option>
                                        @endforeach
                                    </select>
								</div>
							</div>
                            <div class="form-buttons-w text-center">
                                <button class="btn btn-primary" type="submit"> সেন্ড করুন</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection