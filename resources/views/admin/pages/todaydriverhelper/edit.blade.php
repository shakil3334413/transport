@extends('admin.layouts.master')
@section('title','Owner Info')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        আজকের গাড়ীর ড্রাইভার এন্ড হেল্পার ইনফরমেশন পরিবর্তন
						<a class="btn btn-success float-right mr-2" href="{{route('driverhelper.create')}}">আজকের গাড়ীর ড্রাইভার & হেল্পার তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('all-driverhelper')}}">সর্বমোট গাড়ীর ড্রাইভার & হেল্পার তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('driverhelper.update',$driverhelper->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								আজকের গাড়ীর ড্রাইভার এন্ড হেল্পার ইনফরমেশন পরিবর্তন  করুণ 
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">ড্রাইভারের নাম </label>
                                <div class="col-sm-5">
                                    <select name="driver_id" id="driver_id" class="form-control">
										@foreach($driver as $drivers)
											 <option value="{{$drivers->id}}" {{ $drivers->id == $driverhelper->driver_id ? 'selected' : '' }}>{{$drivers->name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">হেল্পার  নাম</label>
								<div class="col-sm-5">
                                	<select name="helper_id" id="helper_id" class="form-control">
										@foreach($helper as $helpers)
										 <option value="{{$helpers->id}}" {{ $helpers->id == $driverhelper->helper_id ? 'selected' : '' }}>{{$helpers->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ীর নাম্বার</label>
								<div class="col-sm-5">
									<select name="bus_id" id="bus_id" class="form-control">
										@foreach($carinfo as $carinfos)
										
										<option value="{{$carinfos->id}}" {{ $carinfos->id == $driverhelper->bus_id? 'selected' : '' }}>{{$carinfos->number}}</option>
										@endforeach
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