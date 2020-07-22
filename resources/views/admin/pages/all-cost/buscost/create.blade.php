@extends('admin.layouts.master')
@section('title','All Bus Cost Creat')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        গাড়ীর সকল খরচ পূরণ করুন
                    </h6>
                    <div class="element-box">
                    <form method="POST" action="{{route('allbuscost.store')}}">
                      @csrf
                          <div class="steps-w">
                            <div class="step-triggers">
                              <a class="step-trigger active" href="#stepContent1">গাড়ীর খরচ</a>
                              <a class="step-trigger" href="#stepContent2">জিপি খরচ  </a>
                              <a class="step-trigger" href="#stepContent3">ড্রাইভারের বেতন</a>
                            </div>
                            <div class="step-contents">
                              <div class="step-content active" id="stepContent1">
                                <div class="form-group">
                                  <label for="">গাড়ির নাম্বার</label>
                                  <select class="form-control" name="bus_id">
                                    @foreach ($bus as $buses)
                                      <option value="{{$buses->id}}">{{$buses->number}}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label for="">তারিখ</label>
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>

                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="">খরচের  নাম</label>
                                      <select class="form-control" name="cost_id">
                                        @foreach ($costlist as $costlists)
                                          <option value="{{$costlists->id}}">{{$costlists->cost_name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="">টাকার  পরিমান </label>
                                    <input class="form-control" placeholder="1000" id="taka" type="number" name="taka" value="{{old('per_ticket_price')}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-buttons-w text-right">
                                  <a class="btn btn-primary step-trigger-btn" href="#stepContent2"> Continue</a>
                                </div>
                              </div>
                              <div class="step-content" id="stepContent2">
                                <div class="form-group">
                                    <label for="">তারিখ</label>
                                    <input type="date" class="form-control" name="gp_date" id="date">
                                </div>
                                <div class="form-group">
                                  <label for=""> মোট টাকা </label>
                                <input class="form-control" placeholder="জিপি খরচের টাকার পরিমান " type="number" id="gp_taka" name="gp_taka" value="0">
                                </div>

                                <div class="form-buttons-w text-right">
                                  <a class="btn btn-primary step-trigger-btn" href="#stepContent3"> Continue</a>
                                </div>
                              </div>
                              <div class="step-content" id="stepContent3">
                                <div class="form-group">
                                  <label for="">ড্রাইভার নাম</label>
                                  <select class="form-control" name="driver_id">
                                    @foreach ($driverinfo as $driver)
                                      <option value="{{$driver->id}}">{{$driver->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="">বেতনের  তারিখ</label>
                                     <input type="date" class="form-control" name="salary_date" id="salary_date">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="">টাকা</label>
                                    <input class="form-control" placeholder="ড্রাইভার বেতন এর টাকার পরিমান" type="number" id="driver_taka" name="driver_taka" value="0">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="">মোট টাকা </label>
                                 <input type="text" value="" class="form-control" id="total_cost" name="total_cost" placeholder="" readonly>
                                </div>
                                <div class="form-buttons-w text-right">
                                  <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script>

    $(document).ready(function(){

      $('#taka').keyup(function() {
        var total = 0;
        var taka = $("#taka").val();
      total = parseInt(taka);
        $('#total_cost').val(total)

      })

      $('#gp_taka').keyup(function() {
        var total = 0;
        var taka = $("#taka").val();
        var gp_taka = $("#gp_taka").val();
      total = parseInt(taka) + parseInt(gp_taka);
        $('#total_cost').val(total)

      })

      $('#driver_taka').keyup(function() {
        var total = 0;
        var taka = $("#taka").val();
        var gp_taka = $("#gp_taka").val();
        var driver_taka = $("#driver_taka").val();
      total = parseInt(taka) + parseInt(gp_taka) + parseInt(driver_taka);
        $('#total_cost').val(total)

      })

    })

    // console.log('tag')



    </script>

@endpush
