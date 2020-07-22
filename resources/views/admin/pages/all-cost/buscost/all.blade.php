@extends('admin.layouts.master')
@section('title','Today EachBus Income')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকে গাড়ি  থেকে খরচ এর তালিক  দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('allbuscost.create')}}">আজকে গাড়ি থেকে খরচ যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1"class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>গাড়ীর নাম্বার </th>
                                <th>গাড়ীর খরচের তারিখ</th>
                                <th>খরচের নাম</th>
                                <th>টাকা</th>
                                <th>জিপি খরচের তারিখ </th>
                                <th>টাকা</th>
                                <th>ড্রাইভারের বেতন খরচের তারিখ</th>
                                <th>ড্রাইভার  নাম </th>
                                <th>টাকা</th>
								{{-- <th class="text-center">অ্যাকশান</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allbuscost as $key=>$eachbus)
								<tr>
                                    <td>{{$eachbus->bus->number}}</td>
                                    <td>{{Carbon\Carbon::parse($eachbus->costadd->date)->format('d-M-Y') }}</td>
									<td>{{$eachbus->costadd->costname->cost_name}}</td>
									<td>{{$eachbus->costadd->taka}}</td>
									<td>{{Carbon\Carbon::parse($eachbus->gpcost->date)->format('d-M-Y') }}</td>
									<td>{{$eachbus->gpcost->taka}}</td>
									<td>{{Carbon\Carbon::parse($eachbus->driversalary->salary_date)->format('d-M-Y') }}</td>
									<td>{{$eachbus->driversalary->driverinfo->name}}</td>
                                    <td>{{$eachbus->driversalary->taka}}</td>

{{--
									<td class="text-center">
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
