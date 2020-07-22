@extends('admin.layouts.master')
@section('title','ToDay Income List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				আজকের  মোট আয়ের তালিকা
            </h6>
            <div class="row">
				<div class="col-sm-6">
					<div class="element-box">
						<div class="table-responsive">
							<table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
								<thead class="bg-dark text-white">
									<tr>
										<th>তারিখ</th>
										<th>কাউন্টার নাম</th>
										<th>শিফট</th>
										<th>টিকেট থেকে</th>
									</tr>
								</thead>
								<tbody>
									@foreach($tickets as $key=>$ticket)
										<tr>
											<td>{{ Carbon\Carbon::parse($ticket->created_at)->format('d-M-Y') }}</td>
											<td>{{$ticket->counter_name}}</td>
											<td>{{$ticket->shift}}</td>
											<td>{{$ticket->taka}}&nbsp;টাকা </td>
										</tr>
									@endforeach
								</tbody>
								<tfoot>
									<td></td>
									<td colspan="2">টোটাল:</td>
									<td class="font-weight-bold">{{$tickettaka}}&nbsp;টাকা </td>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="element-box">
						<div class="table-responsive">
							<table width="100%" class="table text-center table-bordered table-striped table-lightfont">
								<thead class="bg-dark text-white">
									<tr>
										<th>তারিখ</th>
										<th>কাউন্টার নাম</th>
										<th>শিফট</th>
										<th>মালামাল থেকে</th>
										<th>সপ্তাহের মোট আয়</th>
									</tr>
								</thead>
								<tbody>
									@foreach($acce as $acces)
										<tr>
											<td>{{ Carbon\Carbon::parse($acces->created_at)->format('d-M-Y') }}</td>
											<td>{{$acces->counter_name}}</td>
											<td>{{$acces->shift}}</td>
											<td>{{$acces->ticket_price}}</td>
											<td></td>
										</tr>
									@endforeach
								</tbody>
								<tfoot>
									<td></td>
									<td></td>
									<td></td>
									<td class="font-weight-bold">{{$accessories}}&nbsp;টাকা </td>
									<td class="font-weight-bold">{{$totalearn}}&nbsp;টাকা</td>
								</tfoot>
							</table>
							{{ $acce->links() }}
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection