@extends('admin.layouts.master')
@section('title','Today Trip Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        আজকের গাড়ীর ট্রিপলিস্ট
						<a class="btn btn-success float-right mr-2" href="{{route('cartrip.index')}}">আজকের গাড়ীর ট্রিপলিস্টের তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('cartripall')}}">সর্বমোট গাড়ীর ট্রিপলিস্টের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('cartrip.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								আজকের গাড়ীর ট্রিপ লিস্টের তালিকা যুক্ত করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ির নাম্বার </label>
                                <div class="col-sm-5">
									<select name="bus_id" id="bus_id" class="form-control">
										@foreach($carnumber as $carnum)
											<option value="{{$carnum->id}}">{{$carnum->number}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ির ট্রিপ নাম্বার</label>
								<div class="col-sm-5">
                                	<input type="number" class="form-control {{ $errors->has('number') ? ' is-invalid' : '' }}" name="trip_number" id="trip_number" value="{{old('number')}}" required>
									<span class="invalid-feedback" role="alert">
										<strong>গাড়ির ট্রিপ নাম্বার অবশ্যই দিতে হবে </strong>
									</span>
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ির ট্রিপ নাম্বার</label>
								<div class="col-sm-5">
                                <input type="date" class="form-control" value="{{old('trip_date')}}" placeholder="" name="trip_date">
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
