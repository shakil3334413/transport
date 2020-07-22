@extends('admin.layouts.master')
@section('title','Owner Info')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        আজকের আয়ের  ইনফরমেশন
						<a class="btn btn-success float-right mr-2" href="{{route('allearn.create')}}">আজকের আয় যোগ করুন</a>
						<a class="btn btn-success float-right mr-2" href="{{route('all-driverhelper')}}">সর্বমোট আয়ের তালিকা</a>
                    </h6>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>সিরিয়াল নাম্বার</th>
                                        <th>তারিখ</th>
                                        <th>কউন্টার নাম</th>
                                        <th>শিফট</th>
                                        <th>টোটাল টিকিট</th>
                                        <th>টিকেট টাকা</th>
                                        <th>টিকেট মোট টাকা</th>
                                        <th>মালামাল এর টাকা </th>
                                        <th>সর্বমোট টাকা </th>
                                        {{-- <th class="text-center">অ্যাকশান</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($titcketearn as $key=>$tdh)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{ Carbon\Carbon::parse($tdh->ticket->date)->format('d-M-Y') }}</td>
                                            <td>{{$tdh->counter->name}}</td>
                                            @if($tdh->ticket->shift==1)
                                            <td>সকাল</td>
                                            @else {
                                                <td>বিকাল</td>
                                            }
                                            @endif
                                            <td>{{$tdh->ticket->total_ticket}}</td>
                                            <td>{{$tdh->ticket->per_ticket_price}}</td>
                                            <td>{{$tdh->ticket->total_amount}}</td>
                                            <td>{{$tdh->accessoriesearn->total_amount}}</td>
                                            <td>{{$tdh->total_earn}}</td>
                                            {{-- <td class="text-center">
                                                <a title="এডিট" class="btn btn-primary btn-sm" href="{{route('allearn.edit',$tdh->id)}}"><i class="fa fa-edit"></i></a>
                                                <button type="button" title="ডিলিট" class="btn btn-danger btn-sm" onclick="if(confirm('আপনি কি আপনার ইনফরমেশন মুচে পেলবেন?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $tdh->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }"><i class="fa fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $tdh->id }}" action="{{ route('allearn.destroy',$tdh->id) }}"  style="display: none;" method="POST">
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
    </div>
</div>
@endsection
