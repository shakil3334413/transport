@extends('admin.layouts.master')
@section('title','Total Counter Details')
@section('content')
<style>
	a.el-tablo .label {
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    font-size: 15px !important;
	}
  a.el-tablo .valu {
	  -webkit-transition: all 0.25s ease;
	  transition: all 0.25s ease;
	  font-size: 15px !important;
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
				সর্বমোট কাউন্টার থেকে আয়, খরচ এবং লাভ দেখুন
			</h6>
			<div class="row">
			  <div class="col-sm-3 col-xxxl-3 text-center">
				<a class="element-box  el-tablo " href="#"  >
					{{-- <div class="label"></div> --}}
					<div class="text-center valu">আয়ঃ {{$mesodayearn}}&nbsp; টাকা</div>
					<div class="text-center valu">খরচঃ {{$mesodaycost}}&nbsp;টাকা</div>
					<div class="text-center valu">লাভঃ {{$mesoprofit}}&nbsp;টাকা</div>
					<hr>
					<div class="label">কাউন্টারঃ মেঘনা </div>
					<div class="label">শিফটঃ সকাল</div>
				</a>
			  </div>
			  <div class="col-sm-3 col-xxxl-3 text-center">
				<a class="element-box  el-tablo " href="#"  >
					{{-- <div class="label"></div> --}}
					<div class="text-center valu">আয়ঃ {{$mebidayearn}}&nbsp; টাকা</div>
					<div class="text-center valu">খরচঃ {{$mebidaycost}}&nbsp;টাকা</div>
					<div class="text-center valu">লাভঃ {{$mebiprofit}}&nbsp;টাকা</div>
					<hr>
					<div class="label">কাউন্টারঃ মেঘনা </div>
					<div class="label">শিফটঃ বিকাল</div>
				</a>
			  </div>
			  <div class="col-sm-3 col-xxxl-3 text-center">
				<a class="element-box  el-tablo " href="#"  >
					{{-- <div class="label"></div> --}}
					<div class="text-center valu">আয়ঃ {{$sosodayearn}}&nbsp; টাকা</div>
					<div class="text-center valu">খরচঃ {{$sosodaycost}}&nbsp;টাকা</div>
					<div class="text-center valu">লাভঃ {{$sosoprofit}}&nbsp;টাকা</div>
					<hr>
					<div class="label">কাউন্টারঃ সোনারগাঁ </div>
					<div class="label">শিফটঃ সকাল</div>
				</a>
			  </div>
			  <div class="col-sm-3 col-xxxl-3 text-center">
				<a class="element-box  el-tablo " href="#"  >
					{{-- <div class="label"></div> --}}
					<div class="text-center valu">আয়ঃ {{$sobidayearn}}&nbsp; টাকা</div>
					<div class="text-center valu">খরচঃ {{$sobidaycost}}&nbsp;টাকা</div>
					<div class="text-center valu">লাভঃ {{$sobiprofit}}&nbsp;টাকা</div>
					<hr>
					<div class="label">কাউন্টারঃ সোনারগাঁ </div>
					<div class="label">শিফটঃ বিকাল</div>
				</a>
			  </div>
			  <div class="col-sm-3 col-xxxl-3 text-center">
				<a class="element-box  el-tablo " href="#"  >
					{{-- <div class="label"></div> --}}
					<div class="text-center valu">আয়ঃ {{$mosodayearn}}&nbsp; টাকা</div>
					<div class="text-center valu">খরচঃ {{$mosodaycost}}&nbsp;টাকা</div>
					<div class="text-center valu">লাভঃ {{$mosoprofit}}&nbsp;টাকা</div>
					<hr>
					<div class="label">কাউন্টারঃ মদনপুর </div>
					<div class="label">শিফটঃ সকাল</div>
				</a>
			  </div>
			  <div class="col-sm-3 col-xxxl-3 text-center">
				<a class="element-box  el-tablo " href="#"  >
					{{-- <div class="label"></div> --}}
					<div class="text-center valu">আয়ঃ {{$mesodayearn}}&nbsp; টাকা</div>
					<div class="text-center valu">খরচঃ {{$mesodaycost}}&nbsp;টাকা</div>
					<div class="text-center valu">লাভঃ {{$mesoprofit}}&nbsp;টাকা</div>
					<hr>
					<div class="label">কাউন্টারঃ মদনপুর </div>
					<div class="label">শিফটঃ বিকাল</div>
				</a>
			  </div>
			  <div class="col-sm-3 col-xxxl-3 text-center">
				<a class="element-box  el-tablo " href="#"  >
					{{-- <div class="label"></div> --}}
					<div class="text-center valu">আয়ঃ {{$stsodayearn}}&nbsp; টাকা</div>
					<div class="text-center valu">খরচঃ {{$stsodaycost}}&nbsp;টাকা</div>
					<div class="text-center valu">লাভঃ {{$stsoprofit}}&nbsp;টাকা</div>
					<hr>
					<div class="label">কাউন্টারঃ স্টেডিয়াম </div>
					<div class="label">শিফটঃ সকাল</div>
				</a>
			  </div>
			  <div class="col-sm-3 col-xxxl-3 text-center">
				<a class="element-box  el-tablo " href="#"  >
					{{-- <div class="label"></div> --}}
					<div class="text-center valu">আয়ঃ {{$stbidayearn}}&nbsp; টাকা</div>
					<div class="text-center valu">খরচঃ {{$stbidaycost}}&nbsp;টাকা</div>
					<div class="text-center valu">লাভঃ {{$stbiprofit}}&nbsp;টাকা</div>
					<hr>
					<div class="label">কাউন্টারঃ স্টেডিয়াম </div>
					<div class="label">শিফটঃ বিকাল</div>
				</a>
			  </div>
			</div>
		</div>
	</div>
</div>
@endsection