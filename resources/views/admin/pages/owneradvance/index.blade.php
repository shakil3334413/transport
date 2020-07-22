@extends('admin.layouts.master')
@section('title','Owner Advance')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				মালিকের অগ্রীম টাকার  ইনফর্মেশন তালিকা  দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('owneradvance.create')}}">মালিকের অগ্রীম টাকা যোগ করুন</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
                                <th>মালিকের নাম</th>
								<th>মালিকের মোবাইল  নাম্বার</th>
								<th>কাউন্টারের নাম</th>
                                <th>কাউন্টারের ঠিকানা</th>
                                <th>টাকা  উত্তোলন / পরিশোধ</th>
                                <th>টাকা</th>
                                <th>মোট টাকা</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($owneradvace as $key=>$owneradvaces)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{$owneradvaces->owner->name}}</td>
									<td>{{$owneradvaces->owner->phone}}</td>
									<td>{{$owneradvaces->counter->name}}</td>
									@if($owneradvaces->counter->address)
									<td>{{$owneradvaces->counter->address}}</td>
									@else
									<td>Counter Address Null</td>
                                    @endif
                                    @if($owneradvaces->choice==1)
                                    <td>উত্তোলন করছে </td>
                                    @else
                                    <td>পরিশোধ করছে </td>
                                    @endif
                                    <td>{{$owneradvaces->taka}}</td>
                                    <td>{{$owneradvaces->total_taka}}
                                        <img src="{{ Storage::url("shakil.jpg") }}"/>
                                    </td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('owneradvance.edit',$owneradvaces->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $owneradvaces->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $owneradvaces->id }}" action="{{route('owneradvance.destroy',$owneradvaces->id)}}"  style="display: none;" method="POST">
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

