@extends('admin.layouts.master')
@section('title','OwnerBus List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সকল মালিক এর গাড়ীর ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('ownerbus.create')}}">মালিকের গাড়ীর ইনফর্মেশন যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                <th>মালিকের  নাম</th>
								<th>মালিকের  মোবাইল  নাম্বার</th>
								<th>গাড়ীর নাম্বার</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buses as $key=>$ownerbusr)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$ownerbusr->owner->name}}</td>
									<td>{{$ownerbusr->owner->phone}}</td>
									<td>{{$ownerbusr->bus->number}}</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('ownerbus.edit',$ownerbusr->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফর্মেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $ownerbusr->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $ownerbusr->id }}" action="{{route('ownerbus.destroy',$ownerbusr->id)}}"  style="display: none;" method="POST">
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