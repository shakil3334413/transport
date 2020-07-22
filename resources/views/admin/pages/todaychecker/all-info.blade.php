@extends('admin.layouts.master')
@section('title','Today Checker List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট গাড়ীর চেকের  ইনফরমেশন দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('todaycheck.index')}}">আজকের গাড়ীর চেকের যোগ করুণ</a>
				<a class="btn btn-success float-right mr-2" href="{{route('todaycheck.create')}}">আজকের গাড়ীর চেকের তালিকা দেখুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                {{-- <th>তারিখ</th> --}}
								<th>চেকারের নাম</th>
								<th>চেকারের নাম্বার</th>
								<th>চেকপোস্টের নাম</th>
								<th>গাড়ীর নাম্বার</th>
								<th>তারিখ</th>
								<th>সময়</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allcheck as $key=>$allchk)
								<tr>
									<td>{{$key + 1}}</td>
									{{-- <td>{{ Carbon\Carbon::parse($allchk->created_at)->format('d-M-Y') }}</td> --}}
									<td>{{$allchk->checkerinfo->name}}</td>
									<td>{{$allchk->checkerinfo->phone}}</td>
									<td>{{$allchk->checkpost->name}}</td>
									<td>{{$allchk->bus->number}}</td>
									<td>{{$allchk->check_date}}</td>
									<td>{{$allchk->check_time}}</td>
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
