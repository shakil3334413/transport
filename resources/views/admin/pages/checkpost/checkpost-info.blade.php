@extends('admin.layouts.master')
@section('title','Checker List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				চেকপোস্টের ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('checkpost.create')}}">নতুন চেকপোস্ট যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>চেকপোস্টের নাম</th>
								<th>চেকপোস্টের ঠিকানা </th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($checkpost as $key=>$check)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$check->name}}</td>
									<td>{{$check->address}}</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('checkpost.edit',$check->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $check->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $check->id }}" action="{{ route('checkpost.destroy',$check->id) }}"  style="display: none;" method="POST">
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
