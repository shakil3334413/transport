@extends('admin.layouts.master')
@section('title','Driver Salary Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        ড্রাইভারের বেতন বাবদ খরচ পরিবর্তন করুণ
						<a class="btn btn-success float-right mr-2" href="{{route('driversalary.index')}}">আজকে ড্রাইভারের বেতনের তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('all-info')}}">সর্বমোট ড্রাইভারের বেতনের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('driversalary.update',$driversalary->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								কাউন্টারম্যানের বেতন বাবদ খরচ পরিবর্তন করুণ
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">ড্রাইভারের নাম </label>
                                <div class="col-sm-5">
									<select name="name" id="driver_name" class="form-control">
										@foreach($driver as $drivers)
										<option value="{{$drivers->name}}" {{$drivers->name == $driversalary->name ? 'selected' : ''}}>{{$drivers->name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">গাডির নাম্বার</label>
								<div class="col-sm-5">
                                	<select name="number" id="car_number" class="form-control">
										@foreach($carinfo as $carinfos)
										<option value="{{$carinfos->number}}" {{$carinfos->number == $driversalary->number ? 'selected' : ''}}>{{$carinfos->number}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">বেতন</label>
								<div class="col-sm-5">
									<input type="number" class="form-control" placeholder="বেতন" name="taka" id="taka" required value="{{$driversalary->taka}}">
									<span class="invalid-feedback" role="alert">
										<strong>বেতন অবশ্যই দিতে হবে </strong>
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