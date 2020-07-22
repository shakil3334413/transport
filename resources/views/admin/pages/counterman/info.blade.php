@extends('admin.layouts.master')
@section('title','Counterman List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				কাউন্টারম্যান এর ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('counterman.index')}}">নতুন  কাউন্টারম্যান যোগ করুন </a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                <th>কাউন্টারম্যান নাম</th>
								<th>মোবাইল নাম্বার</th>
								<th>ন্যাশনাল আইডি নাম্বার </th>
								<th>ঠিকানা</th>
								<th>ছবি </th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($countermans as $key=>$counterman)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$counterman->name}}</td>
									<td>{{$counterman->phone}}</td>
									<td>{{$counterman->national_id}}</td>
									<td>{{$counterman->address}}</td>
									@if($counterman->image)
									<td><img src="{{asset('countermans/'.$counterman->image)}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img></td>
									@else
									<td><img src="{{asset('countermans/dafault.png')}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img></td>
									@endif
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('counterman.edit',$counterman->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $counterman->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $counterman->id }}" action="{{ route('counterman.destroy',$counterman->id) }}"  style="display: none;" method="POST">
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