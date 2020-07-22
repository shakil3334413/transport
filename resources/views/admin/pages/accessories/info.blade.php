@extends('admin.layouts.master')
@section('title','All Accessories List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				সর্বমোট কাউন্টার থেকে মালামালের টিকিট বিক্রি তালিকা  
				<a class="btn btn-success float-right mr-2" href="{{route('accessories.create')}}">মালামালের টিকিট বিক্রি যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('accessories.index')}}">আজকে মালামালের টিকেট বিক্রির তালিকা</a>
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
								<th>মালামালের   মূল্য</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accessories as $key=>$accessorie)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{ Carbon\Carbon::parse($accessorie->created_at)->format('d-M-Y') }}</td>
									<td>{{$accessorie->counter_name}}</td>
									<td>{{$accessorie->shift}}</td>
									<td>{{$accessorie->ticket_price}}</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<td></td>
							<td></td>
							<td colspan="2">টোটাল: </td>
							<td class="font-weight-bold">{{$counttaka}}&nbsp;টাকা</td>
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
