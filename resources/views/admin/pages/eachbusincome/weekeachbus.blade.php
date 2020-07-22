@extends('admin.layouts.master')
@section('title','Today EachBus Income')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকের প্রতিটি গাড়ীর আয়ের  তালিকা দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('eachbusincome.index')}}">আজকের প্রতিটি গাড়ীর আয়ের তালিকা যুক্ত করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1"class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>

                                <th>তারিখ</th>
                                <th>গাড়ীর নাম্বার </th>
                                {{-- <th>টোটাল ট্রিপ সংখ্যা</th> --}}
                                <th>বাসের ট্রিপ সংখ্যা</th>
                                {{-- <th>টোটাল টাকা</th> --}}
                                <th>ট্রিপের হার</th>
                                <th>আয়</th>
                                <th>জালানি খরচ</th>
                                <th>স্টাফ বেতন</th>
								<th>নীট আয়</th>
								<th>সাবেক</th>
								<th>মোট আয়</th>
								<th>উত্তোলন</th>
								<th>অবশিষ্ট</th>
								<th>জরিমানা</th>
								{{-- <th class="text-center">অ্যাকশান</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eachbusincome as $key=>$eachbus)
								<tr>
									<td>{{Carbon\Carbon::parse($eachbus->date)->format('d-M-Y') }}</td>
									<td>{{$eachbus->bus->number}}</td>
									{{-- <td>{{$eachbus->all_trip}}</td> --}}
									<td>{{$eachbus->trip_number}}</td>
									{{-- <td>{{$eachbus->all_bus_earn}}</td> --}}
									<td>{{$eachbus->trip_rate}}</td>
									<td>{{$eachbus->earn}}</td>
									<td>{{$eachbus->oil_cost}}</td>
									<td>{{$eachbus->staff_cost}}</td>
                                    <td>{{$eachbus->neat_earn}}</td>
                                    <td>{{$eachbus->ogrim_taka}}</td>
                                    <td>{{$eachbus->total_earn}}</td>
                                    <td>{{$eachbus->uttolon_taka}}</td>
                                    <td>{{$eachbus->obosisto_taka}}</td>
                                    <td>{{$eachbus->joripana}}</td>
									{{-- <td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('eachbusincome.edit',$eachbus->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $eachbus->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $eachbus->id }}" action="{{ route('eachbusincome.destroy',$eachbus->id) }}"  style="display: none;" method="POST">
											@csrf
											@method('DELETE')
										</form>
									</td> --}}

								</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
