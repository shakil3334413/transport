@extends('admin.layouts.master')
@section('title','Counterman Salary List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকে কাউন্টারম্যানের বেতনের তালিকা দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('countermansalary.create')}}">কাউন্টারম্যানের বেতন যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('csall-info')}}">সর্বমোট কাউন্টারম্যানের বেতনের তালিকা দেখুন</a>
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
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($countermansalary as $key=>$coumansalary)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{Carbon\Carbon::parse($coumansalary->created_at)->format('d-M-Y') }}</td>
									<td>{{$coumansalary->name}}</td>
									<td>{{$coumansalary->counter_name}}</td>
									<td>{{$coumansalary->shift}}</td>
									<td>{{$coumansalary->taka}}&nbsp;টাকা</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('countermansalary.edit',$coumansalary->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $coumansalary->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $coumansalary->id }}" action="{{ route('countermansalary.destroy',$coumansalary->id) }}"  style="display: none;" method="POST">
											@csrf
											@method('DELETE')
										</form>
									</td>
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
								<td></td>
							</tr>
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
