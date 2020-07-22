@extends('admin.layouts.master')
@section('title','Counter Cost List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				কাউন্টার খরচ এর ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('countercostadd.create')}}">নতুন খরচ যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('countercostadd.index')}}">আজকে খরচ এর তালিকা দেখুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>তারিখ </th>
								<th>কাউন্টার নাম</th>
								<th>শিফট</th>
								<th>খরচ এর তালিকা</th>
								<th>টাকার পরিমাপ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coutercostlists as $key=>$costlist)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{ Carbon\Carbon::parse($costlist->created_at)->format('d-M-Y') }}</td>
									<td>{{$costlist->counter_name}}</td>
									<td>{{$costlist->shift}}</td>
									<td>{{$costlist->cost_name}}</td>
									<td>{{$costlist->taka}}&nbsp;টাকা</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<td></td>
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