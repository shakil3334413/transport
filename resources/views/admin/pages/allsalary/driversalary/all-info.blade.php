@extends('admin.layouts.master')
@section('title','All Driver Salary List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট ড্রাইভারের  বেতনের তালিকা 
				<a class="btn btn-success float-right mr-2" href="{{route('driversalary.create')}}">ড্রাইভারের বেতন যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('driversalary.index')}}">আজকের  ড্রাইভারের বেতনের তালিকা</a>
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
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td></td>
								<td></td>
								<td colspan="2">টোটাল :</td>
								<td class="font-weight-bold">{{$counttaka}}&nbsp;টাকা</td>
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
