@extends('admin.layouts.master')
@section('title','Total Earn Creat')
@section('content')

<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.message.success')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        আজকের গাড়ীর ড্রাইভার এন্ড হেল্পার ইনফরমেশন
                        <a class="btn btn-success float-right mr-2" href="{{ route('allearn.index') }}">আজকের আয়ের তালিকা</a>
                        <a class="btn btn-success float-right mr-2" href="">সর্বমোট আয়ের  তালিকা</a>
                    </h6>
                    <div class="element-box">
                    <form method="POST" action="{{route('allearn.store')}}">
                      @csrf
                          <div class="steps-w">
                            <div class="step-triggers">
                              <a class="step-trigger active" href="#stepContent1">টিকেট  থেকে  আয় </a><a class="step-trigger" href="#stepContent2">মালামাল থেকে আয় </a>
                            </div>
                            <div class="step-contents">
                              <div class="step-content active" id="stepContent1">
                                <div class="form-group">
                                  <label for="">কাউন্টার</label>
                                  <select class="form-control " name="counter_id" >
                                    <option>কাউন্টার  নির্বাচন করুন </option>
                                    @foreach ($counter as $count)
                                  <option value="{{$count->id}}">{{$count->name}}</option>
                                    @endforeach

                                  </select>
                                  @if ($errors->has('counter_id'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong  style="color: red;">কাউন্টার  নির্বাচন করুন</strong>

                                  </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="">তারিখ</label>
                                    <input type="date" name="date" class="form-control">
                                  </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="total_ticket"> মোট টিকেট সংখ্যা </label>
                                    <input class="form-control" id="total_ticket" placeholder="মোট টিকেট সংখ্যা " type="number" min="1" name="total_ticket" value="{{old('total_ticket')}}">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="per_ticket_price">প্রতিটি টিকেট এর  মূল্য </label>
                                    <input class="form-control" id="per_ticket_price" placeholder="Exp:৩০ টাকা " type="number" name="per_ticket_price" value="{{old('per_ticket_price')}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="total_amount"> মোট  টাকা </label>
                                    <input class="form-control" placeholder=""  id="total_amount" type="text" name="total_amount"  readonly value="{{old('total_amount')}}">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="">শিফট </label>
                                      <select name="shift" id="" class="form-control">
                                        <option value="1">সকাল </option>
                                        <option value="0">বিকাল</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>


                                <div class="form-buttons-w text-right">
                                  <a class="btn btn-primary step-trigger-btn" href="#stepContent2"> Continue</a>
                                </div>
                              </div>
                              <div class="step-content" id="stepContent2">
                                <div class="form-group">
                                  <label for="ass_total">মালামাল মোট টাকা </label>
                                <input class="form-control" id="ass_total" placeholder="Exp:৩০ টাকা" type="number" name="ass_total" value="0">
                                </div>
                                <div class="form-group">
                                  <label for="total_earn">সর্বমোট টাকা </label>
                                <input class="form-control" id="total_earn" placeholder="Exp:৩০ টাকা" type="number" name="total_earn" value="{{old('total_earn')}}" disabled>
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


      $('#per_ticket_price').keyup(function() {
        var total = 0;
        var total_ticket = $("#total_ticket").val();
        var per_ticket_price = $("#per_ticket_price").val();

      total = parseInt(total_ticket) * parseInt(per_ticket_price);
        $('#total_amount').val(total)
      })

      $('#ass_total').keyup(function(){
        var tol=0;
        var total_amount=$("#total_amount").val();
        var ass_total=$("#ass_total").val();

        tol=parseInt(total_amount) + parseInt(ass_total);
        $('#total_earn').val(tol)
      })


    })

    // console.log('tag')



    </script>

@endpush
