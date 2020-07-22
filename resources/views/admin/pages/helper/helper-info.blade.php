@extends('admin.layouts.master')
@section('title','Helper List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সকল  হেল্পার এর  ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('helper.index')}}">নতুন  হেল্পার যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                <th>নাম</th>
								<th>মোবাইল নাম্বার</th>
								<th>ন্যাশনাল আইডি নাম্বার </th>
								<th>ঠিকানা</th>
								<th>ছবি</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($helpers as $key=>$helper)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$helper->name}}</td>
									<td>{{$helper->phone}}</td>
									<td>{{$helper->national_id}}</td>
									<td>{{$helper->address}}</td>
									@if($helper->image)
									<td><img src="{{asset('helpers/'.$helper->image)}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img></td>
									@else
									<td><img src="{{asset('helpers/dafault.png')}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img></td>
									@endif
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('helper.edit',$helper->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $helper->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $helper->id }}" action="{{ route('helper.destroy',$helper->id) }}"  style="display: none;" method="POST">
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
