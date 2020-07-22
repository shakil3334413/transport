@extends('admin.layouts.master')
@section('title','Counter Cost List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				কাউন্টার খরচের ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('countercostlist.create')}}">নতুন খরচের নাম যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>কাউন্টার খরচের নাম</th>
								<th>কাউন্টার খরচের বর্ণনা</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($countercost as $key=>$countercosts)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$countercosts->cost_name}}</td>
									<td>{{$countercosts->cost_details}}</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('countercostlist.edit',$countercosts->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $countercosts->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $countercosts->id }}" action="{{route('countercostlist.destroy',$countercosts->id)}}"  style="display: none;" method="POST">
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
