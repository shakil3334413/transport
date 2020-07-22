@extends('admin.layouts.master')
@section('title','Today Trip Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        আজকের গাড়ীর ট্রিপলিস্ট পরিবর্তন
						<a class="btn btn-success float-right mr-2" href="{{route('cartrip.index')}}">আজকের গাড়ীর ট্রিপলিস্টের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('cartrip.update',$cartrip->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								আজকের গাড়ীর ট্রিপ লিস্টের তালিকা পরিবর্তন করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ির নাম্বার </label>
                                <div class="col-sm-5">
									<select name="bus_id" id="bus_id" class="form-control">
										@foreach($carnumber as $carnum)
											<option value="{{$carnum->id}}" {{$carnum->id == $cartrip->bus_id ? 'selected' : ''}}>{{$carnum->number}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ির ট্রিপ নাম্বার</label>
								<div class="col-sm-5">
                                	<input type="number" class="form-control"  name="trip_number" id="trip_number"  required value="{{$cartrip->trip_number}}">
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ির ট্রিপ নাম্বার</label>
								<div class="col-sm-5">
                                <input type="datetime-local" class="form-control" value="{{$cartrip->trip_date}}" placeholder="{{$cartrip->trip_date}}" name="trip_date">
                                <input type="text" value="{{$cartrip->trip_date}}" hidden name="old_date">
                                <strong class="" style="color:red;">{{$cartrip->trip_date}}</strong>
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