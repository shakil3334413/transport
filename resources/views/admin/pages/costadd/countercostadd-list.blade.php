@extends('admin.layouts.master')
@section('title','Counter Costadd List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				কাউন্টার খরচ এর ইনফর্মেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('countercostadd.create')}}">নতুন খরচ যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('countercostadd-all')}}">সর্বমোট  খরচ এর তালিকা দেখুন</a>
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
								<th class="text-center">অ্যাকশান</th>
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
									<td>{{$costlist->taka}}&nbsp;টাকা </td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('countercostadd.edit',$costlist->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $costlist->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $costlist->id }}" action="{{route('countercostadd.destroy',$costlist->id)}}"  style="display: none;" method="POST">
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
