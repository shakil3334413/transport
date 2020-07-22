@extends('admin.layouts.master')
@section('title','Ticket Sell Create')
@section('content')

<div class="dt-page__header">
    <h1 class="dt-page__title"> আজকে কাউন্টার থেকে টিকিট  বিক্রি ইনফরমেশন যোগ করুণ </h1>
</div>
<div class="row">
	<div class="col-md-5 mb-5">
		<a href="{{route('ticket-list')}}" class="btn btn-info btn-lg">আজকের গাড়ীর টিকেট সংখ্যা তালিকা দেখুন</a>
	</div>
	<div class="col-md-4 mb-5">
		<a href="{{route('all-ticket-list')}}" class="btn btn-info btn-lg">সর্বমোট গাড়ীর টিকেট সংখ্যা তালিকা দেখুন</a>
	</div>
</div>
<div class="row owner-form">
	<div class="col-md-4 mt-5 ml-5">
		<form action="" method="post">
			<div class="form-group">
				<label for="mobile">কাউন্টার নাম</label>
				<select name="" id="mobile" class="form-control">
					<option value="">iop4otreitu</option>
				</select>
			</div>
			<div class="form-group">
				<label for="bus_number">গাড়ীর নাম্বার</label>
				<select name="" id="bus_number" class="form-control">
					<option value="">iop4otreitu</option>
				</select>
			</div>
			<div class="form-group">
				<label for="bus_number">টিকেট সংখ্যা </label>
				<input type="number" class="form-control" placeholder="" name="" id="">
			</div>
			<input type="submit" value="সেইভ করুন" class="btn btn-primary">
		</form>
	</div>
</div>
@endsection