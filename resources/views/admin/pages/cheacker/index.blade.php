@extends('admin.layouts.master')
@section('title','Cheacker Create')
@section('content')
<div class="dt-page__header">
    <h1 class="dt-page__title">চেকার এর   ইনফর্মেশন পূরণ  করুন</h1>
</div>
<div class="row">
	<div class="col-md-3 mb-5">
		<a href="{{route('checker-info')}}" class="btn btn-info btn-lg">চেকার এর  তালিকা দেখুন</a>
	</div>
</div>
<div class="row owner-form">
	<div class="col-md-4 mt-5 ml-5">
		<form action="" method="post">
			<div class="form-group">
				<label for="name">নাম </label>
				<input type="text" class="form-control" name="name" id="name" placeholder="নাম">
			</div>
			<div class="form-group">
				<label for="mobile">মোবাইল  নাম্বার</label>
				<input type="text" class="form-control" name="mobile" id="mobile" placeholder="মোবাইল  নাম্বার ">
			</div>
			<div class="form-group">
				<label for="national-id">ন্যাশনাল  আইডি  নাম্বার  </label>
				<input type="text" class="form-control" name="national_id" id="national-id" placeholder="ন্যাশনাল  আইডি  নাম্বার ">
			</div>
			<div class="form-group">
				<label for="address">ঠিকানা</label>
				<textarea name="address" id="" cols="30" rows="10" class="form-control"  id="address" placeholder="ঠিকানা"></textarea>
			</div>
			<input type="submit" value="সেইভ করুন" class="btn btn-primary">
		</form>
	</div>
</div>
@endsection