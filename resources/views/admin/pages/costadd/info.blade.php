@extends('admin.layouts.master')
@section('title','Cost List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				খরচ এর ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('costadd.create')}}">নতুন খরচ যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('costadd-all-info')}}">সর্বমোট  খরচ এর তালিকা দেখুন</a>
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
								<th class="text-center">অ্যাকশান</th>
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
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('costadd.edit',$costadds->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $costadds->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $costadds->id }}" action="{{route('costadd.destroy',$costadds->id)}}"  style="display: none;" method="POST">
											@csrf
											@method('DELETE')
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<td></td>
							<td></td>
							<td colspan="2">টোটাল:</td>
							<td>{{$counttaka}}&nbsp;টাকা</td>
							<td></td>
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection