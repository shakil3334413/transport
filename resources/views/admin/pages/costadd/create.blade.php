@extends('admin.layouts.master')
@section('title','Cost Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        খরচের ইনফর্মেশন 
						<a class="btn btn-success float-right mr-2" href="{{route('costadd.index')}}"> খরচের তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('costadd-all-info')}}">সর্বমোট খরচের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('costadd.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								খরচের ইনফর্মেশন পূরণ  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ীর নাম </label>
                                <div class="col-sm-5">
									<select name="number" id="number" class="form-control">
										@foreach($carnumber as $carnum)
											<option value="{{$carnum->number}}">{{$carnum->number}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">খরচের তালিকা</label>
                                <div class="col-sm-5">
									<select name="cost_name" id="cost_name" class="form-control">
										@foreach($costlist as $costlists)
											<option value="{{$costlists->cost_name}}">{{$costlists->cost_name}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">টাকার পরিমান</label>
                                <div class="col-sm-5">
									<input type="number" class="form-control{{ $errors->has('taka') ? ' is-invalid' : '' }}" name="taka" id="taka" placeholder="টাকার পরিমান লেখুন">
									@if ($errors->has('taka'))
										<span class="invalid-feedback" role="alert">
											<strong>টাকার পরিমান অবশ্যই দিতে হবে </strong>
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