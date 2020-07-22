@extends('admin.layouts.master')
@section('title','Home')
@section('content')
<style>
  a.el-tablo .label {
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    font-size: 18px !important;
}
a.el-tablo .value {
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    font-size: 18px !important;
}
.el-tablo:not(.centered) {
    /* padding-right: 5px; */
    padding: 30px;
}
</style>
<div class="content-i">
  <div class="content-box">
      <div class="element-wrapper">
          <h6 class="element-header">
            ড্যাশবোর্ড 
            <a href="{{route('chart')}}" class="btn btn-primary float-right">চার্ট ড্যাশবোর্ড</a>
          </h6>
          <div class="row">
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('today')}}"  >
                  <div class="label">আজকের মোট আয়</div>
                  <div class="text-center  value">{{$todaytotalearn}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('week')}}"  >
                  <div class="label">এ সপ্তাহের মোট আয়</div>
                  <div class="text-center value">{{$weektotalearn}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('month')}}"  >
                  <div class="label">এ মাসের মোট আয়</div>
                  <div class="text-center value">{{$monthtotalearn}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('year')}}"  >
                  <div class="label">এ বছরের মোট আয়</div>
                  <div class="text-center value">{{$ytotalearn}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('total')}}"  >
                  <div class="label">সর্বমোট আয়</div>
                  <div class="text-center value">{{$ttotalearn}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('today1')}}"  >
                  <div class="label">আজকের মোট খরচ</div>
                  <div class="text-center  value">{{$todaytotal}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('week1')}}"  >
                  <div class="label">এ সপ্তাহের মোট খরচ</div>
                  <div class="text-center value">{{$weektotalcost}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('month1')}}"  >
                  <div class="label">এ মাসের মোট খরচ</div>
                  <div class="text-center value">{{$mtotalcost}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('year1')}}"  >
                  <div class="label">এ বছরের মোট খরচ</div>
                  <div class="text-center value">{{$ytotal}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('total1')}}"  >
                  <div class="label">সর্বমোট খরচ</div>
                  <div class="text-center value">{{$ttotal}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('owner.create')}}"  >
                  <div class="label">গাড়ীর মালিক সংখ্যা</div>
                  <div class="text-center value">{{($total['owner'])? $total['owner']:0}} জন</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('driver.create')}}"  >
                  <div class="label">ড্রাইভার  সংখ্যা</div>
                  <div class="text-center value">{{($total['driver'])? $total['driver']:0}} জন</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('helper.create')}}"  >
                  <div class="label">হেল্পার  সংখ্যা</div>
                  <div class="text-center value">{{($total['helper'])? $total['helper']:0}} জন</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('counter.index')}}"  >
                  <div class="label">কাউন্টার  সংখ্যা</div>
                  <div class="text-center value">{{($total['counter'])? $total['counter']:0}} টি</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('bus.index')}}"  >
                  <div class="label">গাডির  সংখ্যা</div>
                  <div class="text-center value">{{($total['carinfo'])? $total['carinfo']:0}} টি</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="{{route('checkpost.index')}}"  >
                  <div class="label">চেকপোস্ট  সংখ্যা</div>
                  <div class="text-center value">{{($total['checkpost'])? $total['checkpost']:0}} টি</div>
              </a>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection