@extends('admin.layouts.master')
@section('title','Ticket Sell List')
@section('content')
<div class="dt-page__header">
    <h1 class="dt-page__title">আজকে কাউন্টার থেকে টিকিট বিক্রি তালিকা দেখুন</h1>
    <hr>
</div>
<div class="row">
	<div class="col-md-5 mb-5">
		<a href="{{route('ticket')}}" class="btn btn-info btn-lg">আজকে কাউন্টার থেকে টিকিট বিক্রি যোগ করুণ  </a>
	</div>
	<div class="col-md-4 mb-5">
		<a href="{{route('all-ticket-list')}}" class="btn btn-info btn-lg">সর্বমোট গাড়ির টিকেট সংখ্যা তালিকা দেখুন</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-hover table-bordered table-striped text-center">
			<thead class="thead-dark">
				<tr>
					<th>কাউন্টারের নাম</th>
					<th>গাড়ীর নাম্বার</th>
					<th>টিকেট সংখ্যা </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>faefs</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection