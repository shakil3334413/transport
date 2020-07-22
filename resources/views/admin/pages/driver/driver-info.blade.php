@extends('admin.layouts.master')
@section('title','Driver List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সকল ড্রাইভারের ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('driver.index')}}">নতুন ড্রাইভার যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                <th>নাম</th>
								<th>মোবাইল নাম্বার</th>
								<th>ড্রাইভিং লাইসেন্স </th>
								<th>ন্যাশনাল আইডি নাম্বার </th>
								<th>ঠিকানা</th>
								<th>ছবি </th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $key=>$driver)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$driver->name}}</td>
									<td>{{$driver->phone}}</td>
									<td>{{$driver->driving_liceing}}</td>
									<td>{{$driver->national_id}}</td>
									<td>{{$driver->address}}</td>
									@if($driver->image)
									<td><img src="{{asset('drivers/'.$driver->image)}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img></td>
									@else
									<td><img src="{{asset('drivers/dafault.png')}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img></td>
									@endif
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('driver.edit',$driver->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $driver->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $driver->id }}" action="{{route('driver.destroy',$driver->id)}}"  style="display: none;" method="POST">
											@csrf
											@method('DELETE')
										</form>
									</td>
									
								</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
