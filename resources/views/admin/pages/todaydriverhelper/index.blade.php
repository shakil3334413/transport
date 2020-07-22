@extends('admin.layouts.master')
@section('title','Owner Info')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        আজকের গাড়ীর ড্রাইভার এন্ড হেল্পার ইনফরমেশন
						<a class="btn btn-success float-right mr-2" href="{{route('driverhelper.create')}}">আজকের গাড়ীর ড্রাইভার & হেল্পার তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('all-driverhelper')}}">সর্বমোট গাড়ীর ড্রাইভার & হেল্পার তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('driverhelper.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								আজকের গাড়ীর ড্রাইভার এন্ড হেল্পার ইনফরমেশন যোগ  করুণ
                            </h5>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-2 offset-md-2">তারিখ</label>
                                <div class="col-sm-5">
                                    <input type="date" name="date" class="form-control" value="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">ড্রাইভারের নাম </label>
                                <div class="col-sm-5">
                                    <select name="driver_id" id="driver_id" class="form-control {{ $errors->has('driver_id') ? ' is-invalid' : '' }}">
										@foreach($driver as $drivers)
										<option value="{{$drivers->id}}">{{$drivers->name}}</option>
										@endforeach
									</select>
									@if ($errors->has('driver_id'))
										<span class="invalid-feedback" role="alert">
											<strong>ড্রাইভারের নাম অবশ্যই দিতে হবে </strong>
										</span>
									@endif
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="helper_id">হেল্পার  নাম</label>
								<div class="col-sm-5">
                                	<select name="helper_id" id="helper_id" class="form-control{{ $errors->has('helper_id') ? ' is-invalid' : '' }}">
										@foreach($helper as $helpers)
										<option value="{{$helpers->id}}">{{$helpers->name}}</option>
										@endforeach
									</select>
									@if ($errors->has('helper_id'))
										<span class="invalid-feedback" role="alert">
											<strong>হেল্পার  নাম অবশ্যই দিতে হবে </strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="bus_id">গাড়ীর নাম্বার</label>
								<div class="col-sm-5">
									<select name="bus_id" id="bus_id" class="form-control {{ $errors->has('bus_id') ? ' is-invalid' : '' }}">
										@foreach($carinfo as $carinfos)
										<option value="{{$carinfos->id}}">{{$carinfos->number}}</option>
										@endforeach
									</select>
									@if ($errors->has('bus_id'))
										<span class="invalid-feedback" role="alert">
											<strong>গাড়ীর নাম্বার অবশ্যই দিতে হবে </strong>
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
