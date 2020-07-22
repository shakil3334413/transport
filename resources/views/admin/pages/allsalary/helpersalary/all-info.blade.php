@extends('admin.layouts.master')
@section('title','All Helper Salary List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট	 হেল্পারের  বেতনের তালিকা দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('helpersalary.create')}}">হেল্পারের বেতন যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('helpersalary.index')}}">আজকে হেল্পারের বেতনের তালিকা</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>তারিখ </th>
								<th>হেল্পারের নাম</th>
								<th>কাউন্টারের নাম</th>
								<th>শিফট</th>
								<th>টাকা</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($helpersalary as $key=>$helpsalary)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{Carbon\Carbon::parse($helpsalary->created_at)->format('d-M-Y') }}</td>
									<td>{{$helpsalary->name}}</td>
									<td>{{$helpsalary->counter_name}}</td>
									<td>{{$helpsalary->shift}}</td>
									<td>{{$helpsalary->taka}}&nbsp;টাকা</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td></td>
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
