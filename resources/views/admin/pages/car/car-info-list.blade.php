@extends('admin.layouts.master')
@section('title','Bus Info List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সকল গাড়ীর  ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('bus.create')}}">নতুন  গাড়ী যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি </th>
                                <th>গাড়ীর মডেল (অপশনাল ) </th>
								<th>গাড়ীর  নাম্বার</th>
								<th>Latitude</th>
								<th>Longitude</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buses as $key=>$bus)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$bus->model}}</td>
									<td>{{$bus->number}}</td>
									<td>{{$bus->lat}}</td>
									<td>{{$bus->long}}</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('bus.edit',$bus->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $bus->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $bus->id }}" action="{{ route('bus.destroy',$bus->id) }}"  style="display: none;" method="POST">
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

