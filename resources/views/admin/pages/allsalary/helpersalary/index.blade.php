@extends('admin.layouts.master')
@section('title','helper Salary List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকে হেল্পারের  বেতনের তালিকা দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('helpersalary.create')}}">হেল্পারের বেতন যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('hsall-info')}}">সর্বমোট হেল্পারের বেতনের তালিকা</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>তারিখ </th>
								<th>হেল্পারের নাম</th>
								<th>কাউন্টারের নাম</th>
								<th>শিফট</th>
								<th>টাকা</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($helpersalary as $key=>$helpsalary)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{Carbon\Carbon::parse($helpsalary->created_at)->format('d-M-Y') }}</td>
									<td>{{$helpsalary->name}}</td>
									<td>{{$helpsalary->counter_name}}</td>
									<td>{{$helpsalary->shift}}</td>
									<td>{{$helpsalary->taka}}&nbsp;টাকা</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('helpersalary.edit',$helpsalary->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $helpsalary->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $helpsalary->id }}" action="{{route('helpersalary.destroy',$helpsalary->id)}}"  style="display: none;" method="POST">
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
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
