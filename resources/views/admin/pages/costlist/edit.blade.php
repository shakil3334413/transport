@extends('admin.layouts.master')
@section('title','Cost Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        গাড়ীর খরচ পরিবর্তন করুন 
						<a class="btn btn-success float-right mr-2" href="{{route('costlist.index')}}">গাড়ীর খরচের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('costlist.update',$costname->id)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						@csrf
						@method('PUT')
                            <h5 class="form-desc">
								গাড়ীর খরচ পরিবর্তন করুন 
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ীর খরচের নাম </label>
                                <div class="col-sm-5">
									<input type="text" class="form-control{{ $errors->has('cost_name') ? ' is-invalid' : '' }}" name="cost_name" id="cost_name" value="{{$costname->cost_name}}">
									@if ($errors->has('cost_name'))
										<span class="invalid-feedback" role="alert">
											<strong>খরচের নাম  অবশ্যই দিতে হবে </strong>
										</span>
									@endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ীর খরচের বর্ণনা  </label>
                                <div class="col-sm-5">
                                <textarea name="cost_details" id="cost_details" cols="46" rows="7" placeholder="গাড়ীর খরচের বর্ণনা">{{$costname->cost_details}}</textarea>
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