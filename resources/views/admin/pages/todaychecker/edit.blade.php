@extends('admin.layouts.master')
@section('title','Today Checker Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        আজকের গাড়ীর চেকের  ইনফরমেশন পরিবর্তন
						<a class="btn btn-success float-right mr-2" href="{{route('todaycheck.create')}}">আজকের গাড়ীর চেকের তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('todayall-info')}}">সর্বমোট গাড়ীর চেকের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('todaycheck.update',$todaycheck->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								আজকের গাড়ীর চেকের  ইনফরমেশন  পরিবর্তন  করুণ 
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">চেকারের নাম </label>
                                <div class="col-sm-5">
									<select name="checker_id" id="checker_id" class="form-control" id="myselect">
										@foreach($checker as $checkers)
										<option value="{{$checkers->id}}" {{$checkers->id == $todaycheck->cheacker_id? 'selected' : '' }} >{{$checkers->name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">চেকপোস্টের  নাম</label>
								<div class="col-sm-5">
                                	<select name="checkpost_id" id="checkpost_id" class="form-control">
										@foreach($checkpost as $chpost)
										<option value="{{$chpost->id}}" {{$chpost->id == $todaycheck->checkpost_id? 'selected' : '' }} >{{$chpost->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ীর নাম্বার</label>
								<div class="col-sm-5">
									<select name="bus_id" id="bus_id" class="form-control">
										@foreach($carinfo as $carnum)
										<option value="{{$carnum->id}}" {{$carnum->id == $todaycheck->bus_id? 'selected' : '' }}>{{$carnum->number}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">চেকের তারিখ</label>
								<div class="col-sm-5">
									<input type="date" class="form-control" name="check_date" placeholder="{{$todaycheck->check_date}}">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">চেকের তারিখ</label>
								<div class="col-sm-5">
									<input type="time" class="form-control" name="check_time" placeholder="{{$todaycheck->check_time}}">
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