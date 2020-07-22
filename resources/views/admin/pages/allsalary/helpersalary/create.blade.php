@extends('admin.layouts.master')
@section('title','helper Salary Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        হেল্পারের বেতন বাবদ খরচ 
						<a class="btn btn-success float-right mr-2" href="{{route('helpersalary.index')}}">আজকে হেল্পারের বেতনের তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('hsall-info')}}">সর্বমোট হেল্পারের বেতনের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('helpersalary.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								হেল্পারের বেতন বাবদ খরচ যোগ করুণ
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">হেল্পারের নাম </label>
                                <div class="col-sm-5">
									<select name="name" id="driver_name" class="form-control">
										@foreach($helper as $helpers)
										<option value="{{$helpers->name}}">{{$helpers->name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">কাউন্টার নাম </label>
                                <div class="col-sm-5">
									<select name="counter_name" id="counter_name" class="form-control">
										@foreach($counter as $counters)
										<option value="{{$counters->counter_name}}">{{$counters->counter_name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">শিফট</label>
								<div class="col-sm-5">
                                	<select name="shift" id="shift" class="form-control">
										<option value="সকাল">সকাল</option>
										<option value="বিকাল">বিকাল</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">বেতন</label>
								<div class="col-sm-5">
									<input type="number" class="form-control" placeholder="বেতন" name="taka" id="taka" required>
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