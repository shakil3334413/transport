@extends('admin.layouts.master')
@section('title','All Owner Info')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সকল  মালিক এর  ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('owner.index')}}">নতুন  মালিক যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>নাম</th>
								<th>মোবাইল  নাম্বার</th>
								<th>ইমেল</th>
								<th>ব্যাংক  নাম্বার(অপশনাল )</th>
								<th>ন্যাশনাল  আইডি  নাম্বার </th>
								<th>ঠিকানা</th>
								<th>আপনার ছবি দিন</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($owner as $key=>$owners)
								<tr>
									<td>{{$owners->name}}</td>
									<td>{{$owners->phone}}</td>
									<td>{{$owners->email}}</td>
									<td>{{$owners->bank_number}}</td>
									<td>{{$owners->national_id}}</td>
									<td>{{$owners->address}}</td>
									@if($owners->image)
									<td><img src="{{asset('owners/'.$owners->image)}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img></td>
									@else
									<td><img src="{{asset('owners/dafault.png')}}" class="img-thumbnail" style="width: 100px;height: 100px;"></img></td>
									@endif
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('owner.edit',$owners->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $owners->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $owners->id }}" action="{{ route('owner.destroy',$owners->id) }}"  style="display: none;" method="POST">
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
