@extends('admin.layouts.master') @section('title','All Counter Cost Creat') @section('content')

<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        কাউন্টার  সকল খরচ পূরণ করুন
                    </h6>
                    <div class="element-box">
                    <form method="POST" action="{{route('allcountercost.store')}}">
                        @csrf
                            <div class="steps-w">
                                <div class="step-triggers">
                                    <a class="step-trigger active" href="#stepContent1">কাউন্টার খরচ যোগ </a>
                                    <a class="step-trigger" href="#stepContent2">কাউন্টারম্যানের বেতন যোগ </a>
                                    <a class="step-trigger" href="#stepContent3">চেকারের  বেতন যোগ </a>
                                    <a class="step-trigger" href="#stepContent4">হেল্পারের বেতন যোগ </a>
                                </div>
                                <div class="step-contents">
                                    <div class="step-content active" id="stepContent1">
                                        <div class="form-group">
                                            <label for="">কাউন্টার</label>
                                            <select class="form-control" name="counter_id">
                                                @foreach ($counter as $counters)
                                            <option value="{{$counters->id}}">{{$counters->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">কাউন্টার খরচের তারিখ</label>
                                            <input type="date" class="form-control" value="" name="counter_cost_date">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">খরচের  নাম</label>
                                                    <select class="form-control" name="counter_cost_id">
                                                        @foreach ($countercostlist as $costlist)
                                                        <option value="{{$costlist->id}}">{{$costlist->cost_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">টাকার  পরিমান</label>
                                                    <input class="form-control" placeholder="1000" type="number" id="taka" name="taka" value="{{old('taka')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-buttons-w text-right">
                                            <a class="btn btn-primary step-trigger-btn" href="#stepContent2"> Continue</a>
                                        </div>
                                    </div>
                                    <div class="step-content" id="stepContent2">
                                        <div class="form-group">
                                            <label for="">কাউন্টারম্যান নাম </label>
                                           <select name="counterman_id" id="" class="form-control">
                                               @foreach ($countemaninfo as $countemaninfos)
                                               <option value="{{$countemaninfos->id}}">{{$countemaninfos->name}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">শিফট</label>
                                                    <select name="co_shift" id="" class="form-control">
                                                        <option value="">Select Your Shift</option>
                                                        <option value="0">সকাল </option>
                                                        <option value="1">বিকাল  </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">বেতনের  তারিখ </label>
                                                    <input type="date" class="form-control" name="counterman_sa_date" value="" id="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">টাকার  পরিমান</label>
                                            <input class="form-control" placeholder="1000" type="number" id="countman_taka"  name="countman_taka" value="{{old('countman_taka')}}">
                                        </div>
                                        <div class="form-buttons-w text-right">
                                            <a class="btn btn-primary step-trigger-btn" href="#stepContent3"> Continue</a>
                                        </div>
                                    </div>
                                    <div class="step-content" id="stepContent3">
                                        <div class="form-group">
                                            <label for="">চেকার নাম</label>
                                           <select name="checker_id" id="" class="form-control">
                                               @foreach ($checkerinfo as $checkerinfos)
                                               <option value="{{$checkerinfos->id}}">{{$checkerinfos->name}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">শিফট</label>
                                                    <select name="checker_shift" id="" class="form-control">
                                                        <option value="">Select Your Shift</option>
                                                        <option value="0">সকাল </option>
                                                        <option value="1">বিকাল  </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">বেতনের  তারিখ </label>
                                                    <input type="date" class="form-control" name="checker_s_date" value="" id="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">টাকার  পরিমান</label>
                                            <input class="form-control" placeholder="1000" type="number" id="checker_s_taka" name="checker_s_taka" value="{{old('countman_taka')}}">
                                        </div>
                                        <div class="form-buttons-w text-right">
                                            <a class="btn btn-primary step-trigger-btn" href="#stepContent4"> Continue</a>
                                        </div>
                                    </div>
                                    <div class="step-content" id="stepContent4">
                                        <div class="form-group">
                                            <label for="">হেল্পার নাম </label>
                                           <select name="helper_id" id="" class="form-control">
                                               @foreach ($helperinfo as $helperinfos)
                                               <option value="{{$helperinfos->id}}">{{$helperinfos->name}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">শিফট</label>
                                                    <select name="helper_shift" id="" class="form-control">
                                                        <option value="">Select Your Shift</option>
                                                        <option value="0">সকাল </option>
                                                        <option value="1">বিকাল  </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">বেতনের  তারিখ </label>
                                                    <input type="date" class="form-control" name="helper_salaray_date" value="" id="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">টাকার  পরিমান</label>
                                            <input class="form-control" placeholder="1000" type="number" id="helpar_taka" name="helpar_taka" value="{{old('countman_taka')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">মোট  টাকার  পরিমান</label>
                                            <input class="form-control" placeholder="1000" type="number" id="total_taka" name="total_taka" readonly>
                                        </div>
                                        <div class="form-buttons-w text-right">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </div>
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
        $('#total_taka').val(total)

      })

      $('#countman_taka').keyup(function() {
        var total = 0;
        var taka = $("#taka").val();
        var countman_taka = $("#countman_taka").val();
      total = parseInt(taka) + parseInt(countman_taka);
        $('#total_taka').val(total)

      })

      $('#checker_s_taka').keyup(function() {
        var total = 0;
        var taka = $("#taka").val();
        var countman_taka = $("#countman_taka").val();
        var checker_s_taka = $("#checker_s_taka").val();
      total = parseInt(taka) + parseInt(countman_taka) + parseInt(checker_s_taka);
        $('#total_taka').val(total)
      })

      $('#helpar_taka').keyup(function() {
        var total = 0;
        var taka = $("#taka").val();
        var countman_taka = $("#countman_taka").val();
        var checker_s_taka = $("#checker_s_taka").val();
        var helpar_taka=$("#helpar_taka").val();
      total = parseInt(taka) + parseInt(countman_taka) + parseInt(checker_s_taka) + parseInt(helpar_taka);
        $('#total_taka').val(total)
      })

    })

    // console.log('tag')



    </script>

@endpush
