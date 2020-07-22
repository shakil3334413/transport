@extends('admin.layouts.master')
@section('title','All Counterman Salary List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট কাউন্টারম্যানের বেতনের তালিকা 
				<a class="btn btn-success float-right mr-2" href="{{route('countermansalary.create')}}">কাউন্টারম্যানের বেতন যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('countermansalary.index')}}">আজকে কাউন্টারম্যানের বেতনের তালিকা</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>তারিখ </th>
								<th>কাউন্টারম্যানের নাম</th>
								<th>কাউন্টারের নাম</th>
								<th>শিফট</th>
								<th>টাকা</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($countermansalary as $key=>$any)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{Carbon\Carbon::parse($any->created_at)->format('d-M-Y') }}</td>
									<td>{{$any->name}}</td>
									<td>{{$any->counter_name}}</td>
									<td>{{$any->shift}}</td>
									<td>{{$any->taka}}&nbsp;টাকা</td>
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
							</tr>
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
