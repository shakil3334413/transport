@extends('admin.layouts.master')
@section('title','All GP Cost List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট জিপি খরচ এর ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('gpcost.create')}}">নতুন খরচ যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('gpcost.index')}}">আজকের  খরচ এর তালিকা দেখুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>তারিখ </th>
								<th>গাড়ীর নাম্বার</th>
								<th>টাকার পরিমাপ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gpcost as $key=>$gpcosts)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{Carbon\Carbon::parse($gpcosts->created_at)->format('d-M-Y') }}</td>
									<td>{{$gpcosts->number}}</td>
									<td>{{$gpcosts->taka}}&nbsp;টাকা </td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<td></td>
							<td></td>
							<td></td>
							<td>{{$counttaka}}&nbsp;টাকা</td>
							
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
