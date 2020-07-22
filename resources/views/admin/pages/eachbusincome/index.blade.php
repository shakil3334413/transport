@extends('admin.layouts.master')
@section('title','EachBus Income Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        প্রতিটি গাড়ীর আয়ের তালিকা
                        <a class="btn btn-success float-right mr-2" href="{{route('eachbusincome.create')}}">প্রতিটি গাড়ীর আয়ের তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('eachbusincome.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								প্রতিটি গাড়ীর আয়ের তালিকা যোগ করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">তারিখ </label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" name="date" placeholder="" value="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">গাড়ীর নাম্বার</label>
                                <div class="col-sm-6">
                                    <select name="bus_id" id="bus_id" class="form-control {{ $errors->has('bus_id') ? ' is-invalid' : '' }}">
                                        <option value="">Select Your Bus Number</option>
										@foreach($carnumber as $carnum)
										<option value="{{$carnum->id}}">{{$carnum->number}}</option>
										@endforeach
                                    </select>
                                    @if ($errors->has('bus_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bus_id') }}</strong>

                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">টোটাল ট্রিপ সংখ্যা</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control" name="all_trip" id="all_trip" value="{{old('all_trip')}}" placeholder="টোটাল ট্রিপ সংখ্যা">
								</div>
							</div>

                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">টোটাল টাকা</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control" name="all_bus_earn" id="all_bus_earn" value="{{old('all_bus_earn')}}" placeholder="টোটাল টাকা">
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">ট্রিপের হার</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control" name="trip_rate" id="trip_rate" value="" null placeholder="ট্রিপের হার" readonly>
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">বাসের ট্রিপ সংখ্যা</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control" name="trip_number" id="trip_number" value="{{old('trip_number')}}" placeholder="ট্রিপ সংখ্যা ">
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">আয়</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control" name="earn" id="earn" value="" placeholder="আয়" readonly>
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">জালানি খরচ</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control" name="oil_cost" id="oil_cost" value="0" placeholder="জালানি খরচ">
								</div>
                            </div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">স্টাফ বেতন</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="staff_cost" id="staff_cost" value="0" placeholder="স্টাফ বেতন">
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">নীট আয়</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="neat_earn" id="neat_earn" value="{{old('neat_earn')}}" placeholder="নীট আয়" readonly>
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-sm-3 col-form-label offset-md-1">উত্তোলন</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="uttolon_taka" id="uttolon_taka" value="{{old('uttolon_taka')}}" placeholder="উত্তোলন টাকা ">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label offset-md-1">জরিমানা</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" name="joripana" id="joripana" placeholder="টাকার পরিমাপ লেখুন">
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

@push('js')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script>

    $(document).ready(function(){


      $('#all_bus_earn,#all_trip').keyup(function() {
        var total = 0;
        var all_bus_earn = $("#all_bus_earn").val();
        var all_trip = $("#all_trip").val();
      total = parseFloat(all_bus_earn) / parseFloat(all_trip);
        $('#trip_rate').val(total)

      })

      $('#trip_number,#trip_rate').keyup(function() {
        var total = 0;
        var trip_rate = $("#trip_rate").val();
        var trip_number = $("#trip_number").val();
      total = parseFloat(trip_rate) * parseFloat(trip_number);
        $('#earn').val(total)
      })

      $('#oil_cost,#staff_cost').keyup(function() {
        var total = 0;
        var earn = $("#earn").val();
        var oil_cost = $("#oil_cost").val();
        var staff_cost = $("#staff_cost").val();
      total = parseFloat(earn) - (parseFloat(oil_cost) + parseFloat(staff_cost));
        $('#neat_earn').val(total)
      })

      $('#staff_cost').keyup(function() {
        var total = 0;
        var earn = $("#earn").val();
        var oil_cost = $("#oil_cost").val();
        var staff_cost = $("#staff_cost").val();
      total = parseFloat(earn) - (parseFloat(oil_cost) + parseFloat(staff_cost));
        $('#neat_earn').val(total)
      })

    })

    // console.log('tag')



    </script>

@endpush
