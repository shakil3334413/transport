@extends('admin.layouts.master')
@section('title','Lineman Salary List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট চেকারের  বেতনের তালিকা দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('linemansalary.create')}}">চেকারের বেতন যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('linemansalary.index')}}">আজকে চেকারের বেতনের তালিকা</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>তারিখ </th>
								<th>চেকারের নাম</th>
								<th>কাউন্টারের নাম</th>
								<th>শিফট</th>
								<th>টাকা</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($linemansalary as $key=>$linemansalarys)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{Carbon\Carbon::parse($linemansalarys->created_at)->format('d-M-Y') }}</td>
									<td>{{$linemansalarys->name}}</td>
									<td>{{$linemansalarys->counter_name}}</td>
									<td>{{$linemansalarys->shift}}</td>
									<td>{{$linemansalarys->taka}}&nbsp;টাকা</td>
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
