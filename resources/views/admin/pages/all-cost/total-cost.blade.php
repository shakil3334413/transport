@extends('admin.layouts.master')
@section('title','Total Cost List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট মোট খরচের তালিকা।
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>সর্বমোট ড্রাইভার খরচ</th>
								<th>সর্বমোট কাউন্টার ম্যান খরচ</th>
								<th>সর্বমোট হেল্পার খরচ </th>
								<th>সর্বমোট চেকার খরচ</th>
								<th>সর্বমোট কাউন্টার  খরচ </th>
								<th>সর্বমোট গাড়ীর খরচ</th>
								<th>সর্বমোট সর্বমোট খরচ</th>
                            </tr>
                        </thead>
                        <tbody>
							<tr>
								<td>{{$driversalary}}&nbsp;টাকা </td>
								<td>{{$countermansalary}}&nbsp;টাকা </td>
								<td>{{$helpersalary}}&nbsp;টাকা </td>
								<td>{{$linemansalary}}&nbsp;টাকা </td>
								<td>{{$counterCostAdd}}&nbsp;টাকা </td>
								<td>{{$carcostadd}}&nbsp;টাকা </td>
								<td>{{$total}}&nbsp;টাকা </td>
							</tr>
						</tbody>
                    </table>
				</div>
				<div class="row">
					<div class="col-sm-4 mt-3">
						<a href="{{route('total-all')}}" class="btn btn-primary">সর্বমোট ড্রাইভার খরচের তালিকা দেখুন </a>
					</div>
					<div class="col-sm-4 mt-3">
						<a href="{{route('total-all')}}" class="btn btn-primary">সর্বমোট কাউন্টার ম্যান তালিকা দেখুন </a>
					</div>
					<div class="col-sm-4 mt-3">
						<a href="{{route('total-all')}}" class="btn btn-primary">সর্বমোট হেল্পার খরচের তালিকা দেখুন </a>
					</div>
					<div class="col-sm-4 mt-3">
						<a href="{{route('total-all')}}" class="btn btn-primary">সর্বমোট চেকার খরচের তালিকা দেখুন </a>
					</div>
					<div class="col-sm-4 mt-3">
						<a href="{{route('total-all')}}" class="btn btn-primary">সর্বমোট কাউন্টার খরচের তালিকা দেখুন </a>
					</div>
					<div class="col-sm-4 mt-3">
						<a href="{{route('total-all')}}" class="btn btn-primary">সর্বমোট গাড়ীর খরচের তালিকা দেখুন </a>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection