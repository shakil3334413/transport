@extends('admin.layouts.master')
@section('title','Ticket Earn List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকে কাউন্টার থেকে টিকিট বিক্রি তালিকা দেখুন
				<a class="btn btn-success float-right mr-2" href="{{route('ticketearn.create')}}">টিকিট বিক্রি যোগ করুন</a>
				<a class="btn btn-success float-right mr-2" href="{{route('all-ticket-list')}}">সর্বমোট গাড়ির টিকেট বিক্রির তালিকা</a>
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
								<th>টিকেট সংখ্যা </th>
								<th>টিকেটের  মূল্য</th>
								<th>টাকা</th>
								<th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ticketearn as $key=>$ticketearns)
								<tr>
									<td>{{$key + 1}}</td>
									<td>{{ Carbon\Carbon::parse($ticketearns->created_at)->format('d-M-Y') }}</td>
									<td>{{$ticketearns->counter_name}}</td>
									<td>{{$ticketearns->shift}}</td>
									<td>{{$ticketearns->ticket_number}}</td>
									<td>{{$ticketearns->price}}</td>
									<td>{{$ticketearns->taka}}&nbsp;টাকা</td>
									<td class="text-center">
										<a title="এডিট" class="btn btn-primary btn-sm" href="{{route('ticketearn.edit',$ticketearns->id)}}"><i class="fa fa-edit"></i></a>
										<button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
											event.preventDefault();
											document.getElementById('delete-form-{{ $ticketearns->id }}').submit();
											}else {
											event.preventDefault();
											}"><i class="fa fa-trash"></i>
										</button>
										<form id="delete-form-{{ $ticketearns->id }}" action="{{route('ticketearn.destroy',$ticketearns->id)}}"  style="display: none;" method="POST">
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
							<td></td>
							<td>আজকে  টিকিট  বিক্রয় সংখ্যা :&nbsp;{{$ticket_number}}&nbsp;টি</td>
							<td></td>
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
