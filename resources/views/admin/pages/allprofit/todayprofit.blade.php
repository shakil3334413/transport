@extends('admin.layouts.master')
@section('title','ToDay All Profit')
@section('content')
<style>
  a.el-tablo .label {
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    font-size: 20px !important;
}
a.el-tablo .value {
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    font-size: 20px !important;
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
            সর্বমোট  লাভের  তালিকা  দেখুন
          </h6>
          <div class="row">
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="#"  >
                  <div class="label">আজকের মোট লাভ</div>
                  <div class="text-center  value">{{$profit}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="#"  >
                  <div class="label">এ সপ্তায়ে মোট লাভ</div>
                  <div class="text-center value">{{$weekprofit }}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="#"  >
                  <div class="label">এ মাসের মোট লাভ</div>
                  <div class="text-center value">{{$mprofit}}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="#"  >
                  <div class="label">এ বছরের মোট লাভ</div>
                  <div class="text-center value">{{$yearprofit }}&nbsp;টাকা</div>
              </a>
            </div>
            <div class="col-sm-4 col-xxxl-3 text-center">
              <a class="element-box  el-tablo " href="#"  >
                  <div class="label">সর্বমোট লাভ</div>
                  <div class="text-center value">{{ $tprofit }}&nbsp;টাকা</div>
              </a>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection