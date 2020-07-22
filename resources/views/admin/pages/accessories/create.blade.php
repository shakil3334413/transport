@extends('admin.layouts.master')
@section('title','Accessories Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                    মালামাল  থেকে আয় 
						<a class="btn btn-success float-right mr-2" href="{{route('accessories.index')}}"> আজকে মালামাল থেকে আয়ের তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('accessories-list')}}">সর্বমোট মালামাল থেকে আয়ের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('accessories.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
                            <h5 class="form-desc">
								মালামাল থেকে আয় যোগ করুণ
                            </h5>
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
									<select name="shift" id="mobile" class="form-control">
										<option value="সকাল">সকাল</option>
										<option value="বিকাল">বিকাল</option>
									</select>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">টিকেটের মূল্য</label>
                                <div class="col-sm-5">
									<input type="number" class="form-control{{ $errors->has('ticket_price') ? ' is-invalid' : '' }}" placeholder="মালামালের   টিকেটের  মূল্য" name="ticket_price" id="price" required>
									<span class="invalid-feedback" role="alert">
										<strong>মালামালের মূল্য অবশ্যই দিতে হবে </strong>
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