@extends('admin.layouts.master')
@section('title','Driver Salary List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকে ড্রাইভারের  বেতনের তালিকা দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('driversalary.create')}}">ড্রাইভারের বেতন যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('all-info')}}">সর্বমোট ড্রাইভারের বেতনের তালিকা দেখুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>তারিখ </th>
								<th>ড্রাইভারের নাম</th>
								<th>গাডির নাম্বার</th>
								<th>টাকা</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($driversalary as $key=>$drisalary)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{Carbon\Carbon::parse($drisalary->created_at)->format('d-M-Y') }}</td>
									<td>{{$drisalary->name}}</td>
									<td>{{$drisalary->number}}</td>
									<td>{{$drisalary->taka}}&nbsp;টাকা</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('driversalary.edit',$drisalary->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $drisalary->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $drisalary->id }}" action="{{route('driversalary.destroy',$drisalary->id)}}"  style="display: none;" method="POST">
											@csrf
											@method('DELETE')
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td></td>
								<td></td>
								<td colspan="2">টোটাল :</td>
								<td class="font-weight-bold">{{$counttaka}}&nbsp;টাকা</td>
								<td></td>
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
