@extends('admin.layouts.master')
@section('title','Ticket Earn Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        টিকেট  থেকে আয় 
						<a class="btn btn-success float-right mr-2" href="{{route('ticketearn.index')}}"> আজকে টিকেট  থেকে আয়ের  তালিকা</a>
						<a class="btn btn-success float-right mr-2" href="{{route('all-ticket-list')}}">সর্বমোট টিকেট  থেকে আয়ের  তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('ticketearn.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								টিকেট  থেকে আয় যোগ করুন
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
                                <label class="col-form-label col-sm-2 offset-md-2" for="">টিকেট সংখ্যা </label>
                                <div class="col-sm-5">
									<input type="number" class="form-control{{ $errors->has('ticket_number') ? ' is-invalid' : '' }}" placeholder="টিকেট সংখ্যা " name="ticket_number" id="ticket_number" required>
									<span class="invalid-feedback" role="alert">
										<strong>টিকেট সংখ্যা অবশ্যই দিতে হবে </strong>
									</span>
                                </div>
							</div>
							<div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">টিকেটের  মূল্য</label>
                                <div class="col-sm-5">
									<input type="number" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="টিকেটের  মূল্য" name="price" id="price" required>
									<span class="invalid-feedback" role="alert">
										<strong>টিকেটের  মূল্য অবশ্যই দিতে হবে </strong>
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