@extends('admin.layouts.master')
@section('title','Helper Message List')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
				হেল্পারের কাছে পাঠানো মেসেজের তালিকা 
				<a class="btn btn-success float-right mr-2" href="{{route('helpermsg')}}">হেল্পারের কাছে মেসেজ পাঠান </a>
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
								<th>আইডি </th>
                                <th>হেল্পারের মোবাইল নাম্বার</th>
								<th>বার্তা বা মেসেজ</th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach($helpermsg as $key=>$item)
							<tr>
								<td>{{$KEY + 1}}</td>
								<td>{{$item->phone}}</td>
								<td>{{$item->message}}</td>
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

