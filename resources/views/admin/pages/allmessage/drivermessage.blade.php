@extends('admin.layouts.master')
@section('title','Driver Message')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <div class="element-box">
                <form action="{{route('drivermsgsend')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="element-wrapper">
                            <h6 class="element-header">
                                ড্রাইভারের কাছে  বার্তা বা মেসেজ পাঠান
                            <a class="btn btn-success float-right mr-2" href="{{route('driverinfo')}}">মেসেজের তালিকা  দেখুন</a>
                            </h6>
                            <div class="element-box">
                                @csrf
                                <div class="form-group">
                                    
                                    <div class="col-sm-12">
                                        <label class="" for="">বার্তা বা মেসেজ:</label>
                                        <textarea name="message" id="" cols="" rows="5" class="form-control" placeholder="Type Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="form-buttons-w text-center">
                                    <button class="btn btn-primary" type="submit">মেসেজ পাঠান </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center">
                                    <input type="checkbox" onclick="toggle(this);">
                                </th>
                                <th class="text-white">Name</th>
                                <th class="text-white">Phone</th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach($driver as $item)
							<tr>
								<td class=""><input type="checkbox" class="check" name="send[]" value="{{ $item->phone }}"></td>
                                <td>{{ $item->name }}</td>
                                <td> {{ $item->phone }}</td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection
<script>
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>