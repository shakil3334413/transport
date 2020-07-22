@extends('admin.layouts.master')
@section('title','Message Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        মালিকের কাছে  তার দৈনিক হিসাব পাঠান  
                    </h6>
                    <div class="element-box">
                        <form action="{{url('send-sms')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								মালিকের কাছে  তার দৈনিক হিসাব পাঠান  
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">সেন্ড নাম্বার</label>
                                <div class="col-sm-5">
                                    <select class="form-control js-select2-placeholder" data-placeholder="Please select a sender" name="sender" required="required">
                                        <option value="8801847169884">8801847169884</option>
                                    </select>
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">মোবাইল নাম্বার</label>
								<div class="col-sm-5">
                                	<input type="text" value="{{$phone}}" name="cellNo" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">হিসাব</label>
								<div class="col-sm-5">
									<textarea rows="5" class="form-control no-resize auto-growth" placeholder="Please type your message... And please don't forget the ENTER key press multiple times :)" name="message">গাড়ির নাম্বার :&nbsp;{{$bus}}&nbsp;। আজকে  গাড়ির  ট্রিপ থেকে আয় :&nbsp;{{$eachbusIncome}}&nbsp;টাকা । &nbsp;আজকে গাড়ির খরচ :&nbsp;{{$eachbuscost}}&nbsp;টাকা । &nbsp;আজকে  গাড়ির আয় :{{$todaycarincome}}&nbsp;টাকা । 
                                    </textarea>
								</div>
                            </div>
                            <div class="form-buttons-w text-center">
                                <button class="btn btn-primary" type="submit"> সেন্ড করুন</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection