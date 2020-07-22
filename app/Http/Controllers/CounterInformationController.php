<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Accessories;
use App\Ticketearn;
use App\Countermansalary;
use App\Helpersalary;
use App\Linemansalary;
use App\Gpcost;
use App\CounterCostAdd;
class CounterInformationController extends Controller
{
    public function Todaycount()
    {    
     // মেঘনা সকাল
        $currentDate = Carbon::now()->toDateString();
        $mesotickettaka=Ticketearn::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesoaccessories=Accessories::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mesodayearncounterCostAdd=CounterCostAdd::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnhelpersalary=Helpersalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnlinemansalary=Linemansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearncountermansalary=Countermansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearn=$mesotickettaka+$mesoaccessories;
        $mesodaycost=$mesodayearncounterCostAdd+$mesodayearnhelpersalary+$mesodayearnlinemansalary+$mesodayearncountermansalary;
        $mesoprofit=$mesodayearn-$mesodaycost;
// মেঘনা বিকাল
        $mebitickettaka=Ticketearn::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebiaccessories=Accessories::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mebidayearncounterCostAdd=CounterCostAdd::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnhelpersalary=Helpersalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnlinemansalary=Linemansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearncountermansalary=Countermansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearn=$mebitickettaka+$mebiaccessories;
        $mebidaycost=$mebidayearncounterCostAdd+$mebidayearnhelpersalary+$mebidayearnlinemansalary+$mebidayearncountermansalary;
        $mebiprofit=$mebidayearn-$mebidaycost;

// সোনারগাঁ সকাল

         $sosotickettaka=Ticketearn::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosoaccessories=Accessories::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $sosodayearncounterCostAdd=CounterCostAdd::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnhelpersalary=Helpersalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnlinemansalary=Linemansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearncountermansalary=Countermansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearn=$sosotickettaka+$sosoaccessories;
        $sosodaycost=$sosodayearncounterCostAdd+$sosodayearnhelpersalary+$sosodayearnlinemansalary+$sosodayearncountermansalary;
        $sosoprofit=$sosodayearn-$sosodaycost;

    // সোনারগাঁ  বিকাল 

        $sobitickettaka=Ticketearn::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobiaccessories=Accessories::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $sobidayearncounterCostAdd=CounterCostAdd::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnhelpersalary=Helpersalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnlinemansalary=Linemansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearncountermansalary=Countermansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearn=$sobitickettaka+$sobiaccessories;
        $sobidaycost=$sobidayearncounterCostAdd+$sobidayearnhelpersalary+$sobidayearnlinemansalary+$sobidayearncountermansalary;
        $sobiprofit=$sobidayearn-$sobidaycost;

        // মদনপুর সকাল

         $mosotickettaka=Ticketearn::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosoaccessories=Accessories::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mosodayearncounterCostAdd=CounterCostAdd::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnhelpersalary=Helpersalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnlinemansalary=Linemansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearncountermansalary=Countermansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearn=$mosotickettaka+$mosoaccessories;
        $mosodaycost=$mosodayearncounterCostAdd+$mosodayearnhelpersalary+$mosodayearnlinemansalary+$mosodayearncountermansalary;
        $mosoprofit=$sosodayearn-$sosodaycost;

    // মদনপুর  বিকাল 

        $mobitickettaka=Ticketearn::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobiaccessories=Accessories::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mobidayearncounterCostAdd=CounterCostAdd::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnhelpersalary=Helpersalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnlinemansalary=Linemansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearncountermansalary=Countermansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearn=$mobitickettaka+$mobiaccessories;
        $mobidaycost=$mobidayearncounterCostAdd+$mobidayearnhelpersalary+$mobidayearnlinemansalary+$mobidayearncountermansalary;
        $mobiprofit=$mobidayearn-$mobidaycost;

        // স্টেডিয়াম সকাল

         $stsotickettaka=Ticketearn::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsoaccessories=Accessories::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $stsodayearncounterCostAdd=CounterCostAdd::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnhelpersalary=Helpersalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnlinemansalary=Linemansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearncountermansalary=Countermansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearn=$stsotickettaka+$stsoaccessories;
        $stsodaycost=$stsodayearncounterCostAdd+$stsodayearnhelpersalary+$stsodayearnlinemansalary+$stsodayearncountermansalary;
        $stsoprofit=$sosodayearn-$sosodaycost;

    // স্টেডিয়াম  বিকাল 

        $stbitickettaka=Ticketearn::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbiaccessories=Accessories::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $stbidayearncounterCostAdd=CounterCostAdd::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnhelpersalary=Helpersalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnlinemansalary=Linemansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearncountermansalary=Countermansalary::latest()->whereDate('created_at',$currentDate)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearn=$stbitickettaka+$stbiaccessories;
        $stbidaycost=$stbidayearncounterCostAdd+$stbidayearnhelpersalary+$stbidayearnlinemansalary+$stbidayearncountermansalary;
        $stbiprofit=$stbidayearn-$stbidaycost;
    	return view('admin.pages.counter-details.todaycount',compact('mesodayearn','mesodaycost','mesoprofit','mebidayearn','mebidaycost','mebiprofit','sosodayearn','sosodaycost','sosoprofit','sobidayearn','sobidaycost','sobiprofit','mosodayearn','mosodaycost','mosoprofit','mobidayearn','mobidaycost','mobiprofit','stsodayearn','stsodaycost','stsoprofit','stbidayearn','stbidaycost','stbiprofit'));
    }
    public function Weekcount()
    {

    	// মেঘনা সকাল
        $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
        $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $mesotickettaka=Ticketearn::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesoaccessories=Accessories::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mesodayearncounterCostAdd=CounterCostAdd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnhelpersalary=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnlinemansalary=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearncountermansalary=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearn=$mesotickettaka+$mesoaccessories;
        $mesodaycost=$mesodayearncounterCostAdd+$mesodayearnhelpersalary+$mesodayearnlinemansalary+$mesodayearncountermansalary;
        $mesoprofit=$mesodayearn-$mesodaycost;
// মেঘনা বিকাল
        $mebitickettaka=Ticketearn::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebiaccessories=Accessories::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mebidayearncounterCostAdd=CounterCostAdd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnhelpersalary=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnlinemansalary=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearncountermansalary=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearn=$mebitickettaka+$mebiaccessories;
        $mebidaycost=$mebidayearncounterCostAdd+$mebidayearnhelpersalary+$mebidayearnlinemansalary+$mebidayearncountermansalary;
        $mebiprofit=$mebidayearn-$mebidaycost;

// সোনারগাঁ সকাল

         $sosotickettaka=Ticketearn::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosoaccessories=Accessories::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $sosodayearncounterCostAdd=CounterCostAdd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnhelpersalary=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnlinemansalary=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearncountermansalary=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearn=$sosotickettaka+$sosoaccessories;
        $sosodaycost=$sosodayearncounterCostAdd+$sosodayearnhelpersalary+$sosodayearnlinemansalary+$sosodayearncountermansalary;
        $sosoprofit=$sosodayearn-$sosodaycost;

    // সোনারগাঁ  বিকাল 

        $sobitickettaka=Ticketearn::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobiaccessories=Accessories::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $sobidayearncounterCostAdd=CounterCostAdd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnhelpersalary=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnlinemansalary=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearncountermansalary=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearn=$sobitickettaka+$sobiaccessories;
        $sobidaycost=$sobidayearncounterCostAdd+$sobidayearnhelpersalary+$sobidayearnlinemansalary+$sobidayearncountermansalary;
        $sobiprofit=$sobidayearn-$sobidaycost;

        // মদনপুর সকাল

         $mosotickettaka=Ticketearn::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosoaccessories=Accessories::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mosodayearncounterCostAdd=CounterCostAdd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnhelpersalary=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnlinemansalary=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearncountermansalary=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearn=$mosotickettaka+$mosoaccessories;
        $mosodaycost=$mosodayearncounterCostAdd+$mosodayearnhelpersalary+$mosodayearnlinemansalary+$mosodayearncountermansalary;
        $mosoprofit=$sosodayearn-$sosodaycost;

    // মদনপুর  বিকাল 

        $mobitickettaka=Ticketearn::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobiaccessories=Accessories::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mobidayearncounterCostAdd=CounterCostAdd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnhelpersalary=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnlinemansalary=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearncountermansalary=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearn=$mobitickettaka+$mobiaccessories;
        $mobidaycost=$mobidayearncounterCostAdd+$mobidayearnhelpersalary+$mobidayearnlinemansalary+$mobidayearncountermansalary;
        $mobiprofit=$mobidayearn-$mobidaycost;

        // স্টেডিয়াম সকাল

         $stsotickettaka=Ticketearn::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsoaccessories=Accessories::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $stsodayearncounterCostAdd=CounterCostAdd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnhelpersalary=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnlinemansalary=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearncountermansalary=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearn=$stsotickettaka+$stsoaccessories;
        $stsodaycost=$stsodayearncounterCostAdd+$stsodayearnhelpersalary+$stsodayearnlinemansalary+$stsodayearncountermansalary;
        $stsoprofit=$sosodayearn-$sosodaycost;

    // স্টেডিয়াম  বিকাল 

        $stbitickettaka=Ticketearn::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbiaccessories=Accessories::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $stbidayearncounterCostAdd=CounterCostAdd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnhelpersalary=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnlinemansalary=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearncountermansalary=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearn=$stbitickettaka+$stbiaccessories;
        $stbidaycost=$stbidayearncounterCostAdd+$stbidayearnhelpersalary+$stbidayearnlinemansalary+$stbidayearncountermansalary;
        $stbiprofit=$stbidayearn-$stbidaycost;
        return view('admin.pages.counter-details.weekcount',compact('mesodayearn','mesodaycost','mesoprofit','mebidayearn','mebidaycost','mebiprofit','sosodayearn','sosodaycost','sosoprofit','sobidayearn','sobidaycost','sobiprofit','mosodayearn','mosodaycost','mosoprofit','mobidayearn','mobidaycost','mobiprofit','stsodayearn','stsodaycost','stsoprofit','stbidayearn','stbidaycost','stbiprofit'));
    }
    public function Monthcount()
    {
    	// মেঘনা সকাল
        $currentDate = Carbon::now()->toDateString();
        $mesotickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesoaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mesodayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearn=$mesotickettaka+$mesoaccessories;
        $mesodaycost=$mesodayearncounterCostAdd+$mesodayearnhelpersalary+$mesodayearnlinemansalary+$mesodayearncountermansalary;
        $mesoprofit=$mesodayearn-$mesodaycost;
// মেঘনা বিকাল
        $mebitickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebiaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mebidayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearn=$mebitickettaka+$mebiaccessories;
        $mebidaycost=$mebidayearncounterCostAdd+$mebidayearnhelpersalary+$mebidayearnlinemansalary+$mebidayearncountermansalary;
        $mebiprofit=$mebidayearn-$mebidaycost;

// সোনারগাঁ সকাল

         $sosotickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosoaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $sosodayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearn=$sosotickettaka+$sosoaccessories;
        $sosodaycost=$sosodayearncounterCostAdd+$sosodayearnhelpersalary+$sosodayearnlinemansalary+$sosodayearncountermansalary;
        $sosoprofit=$sosodayearn-$sosodaycost;

    // সোনারগাঁ  বিকাল 

        $sobitickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobiaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $sobidayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearn=$sobitickettaka+$sobiaccessories;
        $sobidaycost=$sobidayearncounterCostAdd+$sobidayearnhelpersalary+$sobidayearnlinemansalary+$sobidayearncountermansalary;
        $sobiprofit=$sobidayearn-$sobidaycost;

        // মদনপুর সকাল

         $mosotickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosoaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mosodayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearn=$mosotickettaka+$mosoaccessories;
        $mosodaycost=$mosodayearncounterCostAdd+$mosodayearnhelpersalary+$mosodayearnlinemansalary+$mosodayearncountermansalary;
        $mosoprofit=$sosodayearn-$sosodaycost;

    // মদনপুর  বিকাল 

        $mobitickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobiaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mobidayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearn=$mobitickettaka+$mobiaccessories;
        $mobidaycost=$mobidayearncounterCostAdd+$mobidayearnhelpersalary+$mobidayearnlinemansalary+$mobidayearncountermansalary;
        $mobiprofit=$mobidayearn-$mobidaycost;

        // স্টেডিয়াম সকাল

         $stsotickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsoaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $stsodayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearn=$stsotickettaka+$stsoaccessories;
        $stsodaycost=$stsodayearncounterCostAdd+$stsodayearnhelpersalary+$stsodayearnlinemansalary+$stsodayearncountermansalary;
        $stsoprofit=$sosodayearn-$sosodaycost;

    // স্টেডিয়াম  বিকাল 

        $stbitickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbiaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $stbidayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearn=$stbitickettaka+$stbiaccessories;
        $stbidaycost=$stbidayearncounterCostAdd+$stbidayearnhelpersalary+$stbidayearnlinemansalary+$stbidayearncountermansalary;
        $stbiprofit=$stbidayearn-$stbidaycost;
        return view('admin.pages.counter-details.monthcount',compact('mesodayearn','mesodaycost','mesoprofit','mebidayearn','mebidaycost','mebiprofit','sosodayearn','sosodaycost','sosoprofit','sobidayearn','sobidaycost','sobiprofit','mosodayearn','mosodaycost','mosoprofit','mobidayearn','mobidaycost','mobiprofit','stsodayearn','stsodaycost','stsoprofit','stbidayearn','stbidaycost','stbiprofit'));
    }
    public function Yearcount()
    {
        // মেঘনা সকাল
        $mesotickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesoaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mesodayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearn=$mesotickettaka+$mesoaccessories;
        $mesodaycost=$mesodayearncounterCostAdd+$mesodayearnhelpersalary+$mesodayearnlinemansalary+$mesodayearncountermansalary;
        $mesoprofit=$mesodayearn-$mesodaycost;
// মেঘনা বিকাল
        $mebitickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebiaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mebidayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearn=$mebitickettaka+$mebiaccessories;
        $mebidaycost=$mebidayearncounterCostAdd+$mebidayearnhelpersalary+$mebidayearnlinemansalary+$mebidayearncountermansalary;
        $mebiprofit=$mebidayearn-$mebidaycost;

// সোনারগাঁ সকাল

         $sosotickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosoaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $sosodayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearn=$sosotickettaka+$sosoaccessories;
        $sosodaycost=$sosodayearncounterCostAdd+$sosodayearnhelpersalary+$sosodayearnlinemansalary+$sosodayearncountermansalary;
        $sosoprofit=$sosodayearn-$sosodaycost;

    // সোনারগাঁ  বিকাল 

        $sobitickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobiaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $sobidayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearn=$sobitickettaka+$sobiaccessories;
        $sobidaycost=$sobidayearncounterCostAdd+$sobidayearnhelpersalary+$sobidayearnlinemansalary+$sobidayearncountermansalary;
        $sobiprofit=$sobidayearn-$sobidaycost;

        // মদনপুর সকাল

         $mosotickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosoaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mosodayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearn=$mosotickettaka+$mosoaccessories;
        $mosodaycost=$mosodayearncounterCostAdd+$mosodayearnhelpersalary+$mosodayearnlinemansalary+$mosodayearncountermansalary;
        $mosoprofit=$sosodayearn-$sosodaycost;

    // মদনপুর  বিকাল 

        $mobitickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobiaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mobidayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearn=$mobitickettaka+$mobiaccessories;
        $mobidaycost=$mobidayearncounterCostAdd+$mobidayearnhelpersalary+$mobidayearnlinemansalary+$mobidayearncountermansalary;
        $mobiprofit=$mobidayearn-$mobidaycost;

        // স্টেডিয়াম সকাল

         $stsotickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsoaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $stsodayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearn=$stsotickettaka+$stsoaccessories;
        $stsodaycost=$stsodayearncounterCostAdd+$stsodayearnhelpersalary+$stsodayearnlinemansalary+$stsodayearncountermansalary;
        $stsoprofit=$sosodayearn-$sosodaycost;

    // স্টেডিয়াম  বিকাল 

        $stbitickettaka=Ticketearn::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbiaccessories=Accessories::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $stbidayearncounterCostAdd=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnhelpersalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnlinemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearncountermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearn=$stbitickettaka+$stbiaccessories;
        $stbidaycost=$stbidayearncounterCostAdd+$stbidayearnhelpersalary+$stbidayearnlinemansalary+$stbidayearncountermansalary;
        $stbiprofit=$stbidayearn-$stbidaycost;
        return view('admin.pages.counter-details.yearcount',compact('mesodayearn','mesodaycost','mesoprofit','mebidayearn','mebidaycost','mebiprofit','sosodayearn','sosodaycost','sosoprofit','sobidayearn','sobidaycost','sobiprofit','mosodayearn','mosodaycost','mosoprofit','mobidayearn','mobidaycost','mobiprofit','stsodayearn','stsodaycost','stsoprofit','stbidayearn','stbidaycost','stbiprofit'));
    }

    public function totalcount(){
        // মেঘনা সকাল
        $mesotickettaka=Ticketearn::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesoaccessories=Accessories::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mesodayearncounterCostAdd=CounterCostAdd::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnhelpersalary=Helpersalary::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearnlinemansalary=Linemansalary::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearncountermansalary=Countermansalary::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mesodayearn=$mesotickettaka+$mesoaccessories;
        $mesodaycost=$mesodayearncounterCostAdd+$mesodayearnhelpersalary+$mesodayearnlinemansalary+$mesodayearncountermansalary;
        $mesoprofit=$mesodayearn-$mesodaycost;
// মেঘনা বিকাল
        $mebitickettaka=Ticketearn::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebiaccessories=Accessories::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mebidayearncounterCostAdd=CounterCostAdd::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnhelpersalary=Helpersalary::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearnlinemansalary=Linemansalary::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearncountermansalary=Countermansalary::latest()
        ->where('counter_name','=','মেঘনা')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mebidayearn=$mebitickettaka+$mebiaccessories;
        $mebidaycost=$mebidayearncounterCostAdd+$mebidayearnhelpersalary+$mebidayearnlinemansalary+$mebidayearncountermansalary;
        $mebiprofit=$mebidayearn-$mebidaycost;

// সোনারগাঁ সকাল

         $sosotickettaka=Ticketearn::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosoaccessories=Accessories::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $sosodayearncounterCostAdd=CounterCostAdd::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnhelpersalary=Helpersalary::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearnlinemansalary=Linemansalary::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearncountermansalary=Countermansalary::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $sosodayearn=$sosotickettaka+$sosoaccessories;
        $sosodaycost=$sosodayearncounterCostAdd+$sosodayearnhelpersalary+$sosodayearnlinemansalary+$sosodayearncountermansalary;
        $sosoprofit=$sosodayearn-$sosodaycost;

    // সোনারগাঁ  বিকাল 

        $sobitickettaka=Ticketearn::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobiaccessories=Accessories::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $sobidayearncounterCostAdd=CounterCostAdd::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnhelpersalary=Helpersalary::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearnlinemansalary=Linemansalary::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearncountermansalary=Countermansalary::latest()
        ->where('counter_name','=','সোনারগাঁ')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $sobidayearn=$sobitickettaka+$sobiaccessories;
        $sobidaycost=$sobidayearncounterCostAdd+$sobidayearnhelpersalary+$sobidayearnlinemansalary+$sobidayearncountermansalary;
        $sobiprofit=$sobidayearn-$sobidaycost;

        // মদনপুর সকাল

         $mosotickettaka=Ticketearn::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosoaccessories=Accessories::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $mosodayearncounterCostAdd=CounterCostAdd::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnhelpersalary=Helpersalary::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearnlinemansalary=Linemansalary::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearncountermansalary=Countermansalary::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $mosodayearn=$mosotickettaka+$mosoaccessories;
        $mosodaycost=$mosodayearncounterCostAdd+$mosodayearnhelpersalary+$mosodayearnlinemansalary+$mosodayearncountermansalary;
        $mosoprofit=$sosodayearn-$sosodaycost;

    // মদনপুর  বিকাল 

        $mobitickettaka=Ticketearn::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobiaccessories=Accessories::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $mobidayearncounterCostAdd=CounterCostAdd::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnhelpersalary=Helpersalary::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearnlinemansalary=Linemansalary::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearncountermansalary=Countermansalary::latest()
        ->where('counter_name','=','মদনপুর')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $mobidayearn=$mobitickettaka+$mobiaccessories;
        $mobidaycost=$mobidayearncounterCostAdd+$mobidayearnhelpersalary+$mobidayearnlinemansalary+$mobidayearncountermansalary;
        $mobiprofit=$mobidayearn-$mobidaycost;

        // স্টেডিয়াম সকাল

         $stsotickettaka=Ticketearn::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsoaccessories=Accessories::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('ticket_price');
        $stsodayearncounterCostAdd=CounterCostAdd::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnhelpersalary=Helpersalary::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearnlinemansalary=Linemansalary::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearncountermansalary=Countermansalary::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','সকাল')
        ->sum('taka');
        $stsodayearn=$stsotickettaka+$stsoaccessories;
        $stsodaycost=$stsodayearncounterCostAdd+$stsodayearnhelpersalary+$stsodayearnlinemansalary+$stsodayearncountermansalary;
        $stsoprofit=$sosodayearn-$sosodaycost;

    // স্টেডিয়াম  বিকাল 

        $stbitickettaka=Ticketearn::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbiaccessories=Accessories::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('ticket_price');
        $stbidayearncounterCostAdd=CounterCostAdd::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnhelpersalary=Helpersalary::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearnlinemansalary=Linemansalary::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearncountermansalary=Countermansalary::latest()
        ->where('counter_name','=','স্টেডিয়াম')
        ->where('shift','=','বিকাল')
        ->sum('taka');
        $stbidayearn=$stbitickettaka+$stbiaccessories;
        $stbidaycost=$stbidayearncounterCostAdd+$stbidayearnhelpersalary+$stbidayearnlinemansalary+$stbidayearncountermansalary;
        $stbiprofit=$stbidayearn-$stbidaycost;
        return view('admin.pages.counter-details.total',compact('mesodayearn','mesodaycost','mesoprofit','mebidayearn','mebidaycost','mebiprofit','sosodayearn','sosodaycost','sosoprofit','sobidayearn','sobidaycost','sobiprofit','mosodayearn','mosodaycost','mosoprofit','mobidayearn','mobidaycost','mobiprofit','stsodayearn','stsodaycost','stsoprofit','stbidayearn','stbidaycost','stbiprofit'));
    
    }
}
