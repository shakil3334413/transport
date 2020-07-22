@extends('admin.layouts.master')
@section('title','Counter Cost Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        কাউন্টার খরচ যোগ করুন 
						<a class="btn btn-success float-right mr-2" href="{{route('countercostlist.index')}}">কাউন্টার খরচের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('countercostlist.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								কাউন্টার খরচ যোগ করুন 
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">কাউন্টার খরচের নাম </label>
                                <div class="col-sm-5">
									<input type="text" class="form-control{{ $errors->has('cost_name') ? ' is-invalid' : '' }}" name="cost_name" id="counter_cost" placeholder="খরচ এর নাম  লেখুন" required>
									<span class="invalid-feedback" role="alert">
										<strong>কাউন্টার খরচের নাম  অবশ্যই দিতে হবে </strong>
									</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">খরচের বর্ণনা  </label>
                                <div class="col-sm-5">
                                    <textarea name="cost_details" id="cost_details" cols="46" rows="7" placeholder="খরচের বর্ণনা"></textarea>
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