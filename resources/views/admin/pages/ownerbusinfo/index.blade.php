@extends('admin.layouts.master')
@section('title','OwnerBus Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
						মালিকের গাড়ীর  ইনফর্মেশন 
                        <a class="btn btn-success float-right mr-2" href="{{route('ownerbus.index')}}">মালিকের গাড়ীর তালিকা দেখুন</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('ownerbus.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                            <h5 class="form-desc">
								মালিকের গাড়ীর  ইনফর্মেশন যোগ করুন
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-2" for="">মালিকের নাম </label>
                                <div class="col-sm-5">
                                    <select name="owner_id" id="owner_id" class="form-control {{ $errors->has('owner_id') ? ' is-invalid' : '' }}">
										@foreach($owners as $owner)
											<option value="{{$owner->id}}">{{$owner->name}}</option>
										@endforeach
									</select>
									@if ($errors->has('owner_id'))
										<span class="invalid-feedback" role="alert">
											<strong>মালিকের নাম  অবশ্যই দিতে হবে </strong>
										</span>
									@endif
                                </div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-2 offset-md-2" for="">গাড়ীর নাম্বার</label>
								<div class="col-sm-5">
                                	<select name="bus_id" id="bus_id" class="form-control {{ $errors->has('bus_id') ? ' is-invalid' : '' }}">
										@foreach($buses as $bus)
											<option value="{{$bus->id}}">{{$bus->number}}</option>
										@endforeach
										@if ($errors->has('bus_id'))
										<span class="invalid-feedback" role="alert">
											<strong>বাস নাম্বার  অবশ্যই দিতে হবে </strong>
										</span>
										@endif
									</select>
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