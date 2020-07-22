@extends('admin.layouts.master')
@section('title','Cheacker List')
@section('content')
<div class="dt-page__header">
    <h1 class="dt-page__title">সকল  চেকার এর   ইনফর্মেশন দেখুন</h1>
</div>
<div class="row">
	<div class="col-md-4 mb-5">
		<a href="{{route('checker')}}" class="btn btn-info btn-lg"><span class="mr-2"><i class="fas fa-user-plus text-white"></i></span>নতুন  চেকার   যোগ করুন </a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-hover table-bordered table-striped text-center">
			<thead class="thead-dark">
				<tr>
					<th>নাম</th>
					<th>মোবাইল  নাম্বার</th>
					<th>ন্যাশনাল আইডি নাম্বার </th>
					<th>ঠিকানা</th>
					<th>এডিট</th>
					<th>ডিলিট</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td><i class="far fa-edit"></i></td>
					<td><i class="fas fa-trash"></i></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection