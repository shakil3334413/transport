@extends('admin.layouts.master')
@section('title','Today All Trip List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট গাড়ীর ট্রিপ লিস্টের তালিকা দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('cartrip.create')}}">আজকের গাড়ীর ট্রিপলিস্টের যোগ করুণ</a>
				<a class="btn btn-success float-right mr-2" href="{{route('cartrip.index')}}">আজকের গাড়ীর ট্রিপলিস্টের তালিকা</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                <th>তারিখ</th>
								<th>গাড়ীর নাম্বার </th>
								<th>ট্রিপ নাম্বার </th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartrip as $key=>$cartrips)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{Carbon\Carbon::parse($cartrips->trip_date)->format('d-M-Y') }}</td>
									<td>{{$cartrips->bus->number}}</td>
									<td>{{$cartrips->trip_number}}</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('cartrip.edit',$cartrips->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $cartrips->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $cartrips->id }}" action="{{ route('cartrip.destroy',$cartrips->id) }}"  style="display: none;" method="POST">
											@csrf
											@method('DELETE')
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td class="font-weight-bold" colspan="3">টোটাল:</td>
								<td class="font-weight-bold">{{$counttrip}}&nbsp;টি</td>
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
