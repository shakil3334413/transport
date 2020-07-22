@extends('admin.layouts.master')
@section('title','Today Driver & Helper')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকের গাড়ীর ড্রাইভার এন্ড হেল্পার  তালিকা  দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('driverhelper.index')}}">গাড়ীর ড্রাইভার এন্ড হেল্পার যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('all-driverhelper')}}">সর্বমোট গাড়ীর   ড্রাইভার এন্ড হেল্পার তালিকা</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                <th>তারিখ</th>
								<th>ড্রাইভার  নাম</th>
								<th>ড্রাইভারের  ফোন  নাম্বার</th>
								<th>হেল্পার  নাম</th>
								<th>হেল্পারের ফোন নাম্বার </th>
								<th>গাড়ীর নাম্বার</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($driverhelper as $key=>$tdh)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{ Carbon\Carbon::parse($tdh->date)->format('d-M-Y') }}</td>
									<td>{{$tdh->driverinfo->name}}</td>
									<td>{{$tdh->driverinfo->phone}}</td>
									<td>{{$tdh->helper_info->name}}</td>
									<td>{{$tdh->helper_info->phone}}</td>
									<td>{{$tdh->bus->number}}</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('driverhelper.edit',$tdh->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $tdh->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $tdh->id }}" action="{{ route('driverhelper.destroy',$tdh->id) }}"  style="display: none;" method="POST">
											@csrf
											@method('DELETE')
										</form>
									</td>
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
