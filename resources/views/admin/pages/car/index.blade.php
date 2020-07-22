@extends('admin.layouts.master')
@section('title','Bus Info Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        গাড়ীর ইনফর্মেশন
                        <a class="btn btn-success float-right mr-2" href="{{route('bus.index')}}">গাড়ীর তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('bus.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								গাড়ীর ইনফর্মেশন পূরণ  করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 offset-md-1" for="">গাড়ীর মডেল (অপশনাল ) </label>
                                <div class="col-sm-6">
									<input type="text" class="form-control" placeholder="গাড়ীর মডেল" name="model" id="modeol">
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">গাড়ীর  নাম্বার</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control {{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" placeholder="গাড়ীর  নাম্বার" id="number" value="{{old('number')}}" required>
									<span class="invalid-feedback" role="alert">
										<strong>গাড়ির নাম্বার  (অবশ্যই দিতে হবে)</strong>
									</span>
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">Latitude (অপশনাল )</label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control {{ $errors->has('lat') ? ' is-invalid' : '' }}" name="lat" placeholder="Latitude" id="lat" value="{{old('lat')}}" required>
                                    @if ($errors->has('lat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lat') }}</strong>
                                        </span>
                                    @endif
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-form-label col-sm-3 offset-md-1" for="">Longitude (অপশনাল ) </label>
								<div class="col-sm-6">
                                	<input type="text" class="form-control {{ $errors->has('long') ? ' is-invalid' : '' }}" name="long" placeholder="Longitude" id="long" value="{{old('long')}}" required>
                                    @if ($errors->has('long'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('long') }}</strong>
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