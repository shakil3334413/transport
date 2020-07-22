@extends('admin.layouts.master')
@section('title','GP Cost Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        জিপি খরচ এর ইনফর্মেশন
						<a class="btn btn-success float-right mr-2" href="{{route('gpcost.index')}}">আজকের  জিপি খরচ এর তালিকা দেখুন</a>
						<a class="btn btn-success float-right mr-2" href="{{route('gpcost-all')}}">সর্বমোট জিপি খরচের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('gpcost.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								জিপি খরচ এর ইনফর্মেশন পূরণ  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ীর নাম্বার </label>
                                <div class="col-sm-5">
									<select name="number" id="number" class="form-control">
										@foreach($carnumber as $carnum)
											<option value="{{$carnum->number}}">{{$carnum->number}}</option>
										@endforeach
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">টাকার পরিমান</label>
                                <div class="col-sm-5">
									<input type="number" class="form-control{{ $errors->has('taka') ? ' is-invalid' : '' }}" name="taka" id="taka" placeholder="টাকার পরিমাপ লেখুন" required>
									<span class="invalid-feedback" role="alert">
										<strong>খরচের নাম অবশ্যই দিতে হবে </strong>
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