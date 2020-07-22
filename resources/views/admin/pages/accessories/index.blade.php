@extends('admin.layouts.master')
@section('title','Accessories List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকে কাউন্টার থেকে মালামালের টিকিট বিক্রি তালিকা  
				<a class="btn btn-success float-right mr-2" href="{{route('accessories.create')}}">মালামালের টিকিট বিক্রি যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('accessories-list')}}">সর্বমোট মালামালের টিকেট বিক্রির তালিকা</a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি</th>
								<th>তারিখ </th>
								<th>কাউন্টারের নাম</th>
								<th>শিফট</th>
								<th>মালামালের মূল্য</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accessoriesearn as $key=>$accessoriesearns)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{ Carbon\Carbon::parse($accessoriesearns->created_at)->format('d-M-Y') }}</td>
									<td>{{$accessoriesearns->counter_name}}</td>
									<td>{{$accessoriesearns->shift}}</td>
									<td>{{$accessoriesearns->ticket_price}}</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('accessories.edit',$accessoriesearns->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $accessoriesearns->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $accessoriesearns->id }}" action="{{route('accessories.destroy',$accessoriesearns->id)}}"  style="display: none;" method="POST">
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
							<td colspan="2">টোটাল: </td>
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