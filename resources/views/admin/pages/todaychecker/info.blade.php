@extends('admin.layouts.master')
@section('title','Today All Checker List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকের গাড়ীর চেকের  ইনফরমেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('todaycheck.index')}}">আজকের গাড়ীর চেকের যোগ করুণ</a>
				<a class="btn btn-success float-right mr-2" href="{{route('todayall-info')}}">সর্বমোট গাড়ীর চেকের তালিকা দেখুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                {{-- <th>তারিখ</th> --}}
								<th>চেকারের নাম</th>
								<th>চেকারের নাম্বার</th>
								<th>চেকপোস্টের নাম</th>
								<th>গাড়ীর নাম্বার</th>
								<th>তারিখ</th>
								<th>সময়</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todaycheck as $key=>$todayck)
								<tr>
									<td>{{$key + 1}}</td>
									{{-- <td>{{ Carbon\Carbon::parse($todayck->created_at)->format('d-M-Y') }}</td> --}}
									<td>{{$todayck->checkerinfo->name}}</td>
									<td>{{$todayck->checkerinfo->phone}}</td>
									<td>{{$todayck->checkpost->name}}</td>
									<td>{{$todayck->bus->number}}</td>
									<td>{{$todayck->check_date}}</td>
									<td>{{$todayck->check_time}}</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('todaycheck.edit',$todayck->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $todayck->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $todayck->id }}" action="{{ route('todaycheck.destroy',$todayck->id) }}"  style="display: none;" method="POST">
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
