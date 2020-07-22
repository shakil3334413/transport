@extends('admin.layouts.master')
@section('title','Today EachBus Income')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট কাউন্টার  থেকে খরচ এর তালিক  দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('allcountercost.create')}}">আজকে কাউন্টার  থেকে খরচ যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1"class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>কাউন্টার  নাম </th>
                                <th>নাম খরচের তারিখ</th>
                                <th>খরচের নাম</th>
                                <th>টাকা</th>
                                <th>কাউন্টারম্যান নাম</th>
                                <th>শিফট</th>
                                <th>কাউন্টারম্যান  বেতন এর তারিখ</th>
                                <th>টাকা</th>
                                <th>চেকার নাম</th>
                                <th>শিফট</th>
                                <th>চেকার  বেতন এর তারিখ</th>
                                <th>টাকা</th>
                                <th>হেল্পার নাম</th>
                                <th>শিফট</th>
                                <th>হেল্পার  বেতন এর তারিখ</th>
                                <th>টাকা</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allbuscost as $key=>$eachbus)
								<tr>
                                    <td>{{$eachbus->counter->name}}</td>

                                    <td>{{Carbon\Carbon::parse($eachbus->countercostadd->date)->format('d-M-Y') }}</td>
                                    <td>{{$eachbus->countercostadd->countercostlist->cost_name}}</td>
                                    <td>{{$eachbus->countercostadd->taka}}</td>
                                    <td>{{$eachbus->countermansalary->countermaninfo->name}}</td>
                                    @if ($eachbus->countermansalary->shift==0)
                                    <td>সকাল</td>
                                     @else
                                     <td>বিকাল</td>
                                    @endif
									<td>{{Carbon\Carbon::parse($eachbus->countermansalary->salary_date)->format('d-M-Y') }}</td>
                                    <td>{{$eachbus->countermansalary->taka}}</td>
                                    <td>{{$eachbus->checksalary->checkerinfo->name}}</td>
                                    @if ($eachbus->checksalary->shift==0)
                                    <td>সকাল</td>
                                     @else
                                     <td>বিকাল</td>
                                    @endif
                                    <td>{{Carbon\Carbon::parse($eachbus->checksalary->salary_date)->format('d-M-Y') }}</td>
                                    <td>{{$eachbus->checksalary->taka}}</td>

									<td>{{$eachbus->helpersalary->helperinfo->name}}</td>
                                    @if ($eachbus->helpersalary->shift==0)
                                    <td>সকাল</td>
                                     @else
                                     <td>বিকাল</td>
                                    @endif
                                    <td>{{Carbon\Carbon::parse($eachbus->helpersalary->salary_date)->format('d-M-Y') }}</td>
                                    <td>{{$eachbus->helpersalary->taka}}</td>

									{{-- <td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('allcountercost.edit',$eachbus->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $eachbus->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $eachbus->id }}" action="{{ route('allcountercost.destroy',$eachbus->id) }}"  style="display: none;" method="POST">
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
