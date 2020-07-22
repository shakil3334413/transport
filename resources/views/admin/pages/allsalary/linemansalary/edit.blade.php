@extends('admin.layouts.master')
@section('title','Lineman Salary Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        চেকারের বেতন বাবদ খরচ পরিবর্তন
						<a class="btn btn-success float-right mr-2" href="{{route('linemansalary.index')}}">আজকে চেকারের বেতনের তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('lsall-info')}}">সর্বমোট চেকারের বেতনের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('linemansalary.update',$linemansalary->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								চেকারের বেতন বাবদ খরচ পরিবর্তন করুণ
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">চেকারের নাম </label>
                                <div class="col-sm-5">
									<select name="name" id="cou_man_name" class="form-control">
										@foreach($checker as $chkr)
										<option value="{{$chkr->name}}" {{ $chkr->name == $linemansalary->name ? 'selected' : '' }} >{{$chkr->name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">কাউন্টার নাম </label>
                                <div class="col-sm-5">
									<select name="counter_name" id="counter_name" class="form-control">
										@foreach($counter as $counters)
										<option value="{{$counters->counter_name}}" {{ $counters->counter_name == $linemansalary->counter_name ? 'selected' : '' }} >{{$counters->counter_name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">শিফট</label>
								<div class="col-sm-5">
                                	<select name="shift" id="shift" class="form-control">
										<option value="সকাল" {{$linemansalary->shift == 'সকাল' ? 'selected' : ''}}>সকাল</option>
										<option value="বিকাল" {{$linemansalary->shift == 'বিকাল' ? 'selected' : ''}}>বিকাল</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">বেতন</label>
								<div class="col-sm-5">
									<input type="number" class="form-control" placeholder="বেতন" name="taka" id="taka" required value="{{$linemansalary->taka}}">
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