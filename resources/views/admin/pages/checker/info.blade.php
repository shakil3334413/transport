@extends('admin.layouts.master')
@section('title','Checker List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সকল চেকারের ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('checker.index')}}">নতুন চেকার যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                <th>চেকারের নাম</th>
								<th>মোবাইল নাম্বার</th>
								<th>ন্যাশনাল আইডি নাম্বার </th>
								<th>ঠিকানা</th>
								<th>ছবি</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($checkers as $key=>$checker)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$checker->name}}</td>
									<td>{{$checker->phone}}</td>
									<td>{{$checker->national_id}}</td>
									<td>{{$checker->address}}</td>
									@if($checker->image)
									<td><img src="{{asset('checkers/'.$checker->image)}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img></td>
									@else
									<td><img src="{{asset('checkers/dafault.png')}}" class="img-thumbnail" style="width: 70px;height: 60px;"></img></td>
									@endif
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('checker.edit',$checker->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $checker->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $checker->id }}" action="{{ route('checker.destroy',$checker->id) }}"  style="display: none;" method="POST">
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
