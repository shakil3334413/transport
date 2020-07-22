@extends('admin.layouts.master')
@section('title','Cost List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট খরচ এর ইনফর্মেশন 
				<a class="btn btn-success float-right mr-2" href="{{route('costadd.create')}}">নতুন খরচ যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('costadd.index')}}"> খরচ এর তালিকা দেখুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>তারিখ </th>
								<th>গাড়ীর নাম্বার</th>
								<th>খরচ এর নাম</th>
								<th>টাকার পরিমাপ</th>
								
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($costadd as $key=>$costadds)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{ Carbon\Carbon::parse($costadds->created_at)->format('d-M-Y') }}</td>
									<td>{{$costadds->number}}</td>
									<td>{{$costadds->cost_name}}</td>
									<td>{{$costadds->taka}}&nbsp;টাকা </td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<td></td>
							<td></td>
							<td colspan="2">টোটাল:</td>
							<td>{{$counttaka}}&nbsp;টাকা</td>
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
