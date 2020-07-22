@extends('admin.layouts.master')
@section('title','Bus Cost List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				খরচের ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('costlist.create')}}">নতুন খরচের নাম যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>গাড়ীর খরচের নাম</th>
								<th>গাড়ীর খরচের বর্ণনা</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($costnames as $key=>$costname)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$costname->cost_name}}</td>
									<td>{{$costname->cost_details}}</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('costlist.edit',$costname->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $costname->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $costname->id }}" action="{{route('costlist.destroy',$costname->id)}}"  style="display: none;" method="POST">
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
