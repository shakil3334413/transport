@extends('admin.layouts.master')
@section('title','Counter Cost List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        কাউন্টার খরচের ইনফর্মেশন পরিবর্তন
						<a class="btn btn-success float-right mr-2" href="{{route('countercostadd.index')}}">কাউন্টার খরচের তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('countercostadd-all')}}">সর্বমোট কাউন্টার খরচের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('countercostadd.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								কাউন্টার খরচের ইনফর্মেশন পরিবর্তন করুন 
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">কাউন্টার নাম </label>
                                <div class="col-sm-5">
									<select name="counter_name" id="number" class="form-control">
										@foreach($counter as $countername)
											<option value="{{$countername->counter_name}}" {{$countername->counter_name == $coutercostlists->counter_name ? 'selected' : ''}}>{{$countername->counter_name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">শিফট</label>
                                <div class="col-sm-5">
									<select name="shift" id="shift" class="form-control">
										<option value="সকাল" {{$coutercostlists->shift == 'সকাল' ? 'selected' : ''}}>সকাল</option>
										<option value="বিকাল" {{$coutercostlists->shift == 'বিকাল' ? 'selected' : ''}}>বিকাল</option>
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">খরচের তালিকা</label>
                                <div class="col-sm-5">
									<select name="cost_name" id="cost_name" class="form-control">
										@foreach($coutercostlistss as $coutercostlist)
											<option value="{{$coutercostlist->counter_cost}}" {{$coutercostlist->counter_cost == $coutercostlists->cost_name ? 'selected' : ''}}>{{$coutercostlist->counter_cost}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">টাকার পরিমান</label>
                                <div class="col-sm-5">
									<input type="number" class="form-control{{ $errors->has('taka') ? ' is-invalid' : '' }}" name="taka" id="taka" value="{{$coutercostlists->taka}}" required>
									<span class="invalid-feedback" role="alert">
										<strong>টাকার পরিমাপ  অবশ্যই দিতে হবে </strong>
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