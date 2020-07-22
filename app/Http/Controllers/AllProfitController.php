<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Countermansalary;
use App\Driversalary;
use App\Helpersalary;
use App\Linemansalary;
use App\Gpcost;
use App\CounterCostAdd;
use App\Costadd;
use App\Accessories;
use App\Ticketearn;
class AllProfitController extends Controller
{
    public function todayprofit()
    {
        $currentDate = Carbon::now()->toDateString();
        $countermansalary=Countermansalary::whereDate('created_at',$currentDate)->sum('taka');
        $driversalary=Driversalary::whereDate('created_at',$currentDate)->sum('taka');
        $helpersalary=Helpersalary::whereDate('created_at',$currentDate)->sum('taka');
        $linemansalary=Linemansalary::whereDate('created_at',$currentDate)->sum('taka');
        $gpcost=Gpcost::whereDate('created_at',$currentDate)->sum('taka');
        $counterCostAdd=CounterCostAdd::whereDate('created_at',$currentDate)->sum('taka');
        $carcostadd=Costadd::whereDate('created_at',$currentDate)->sum('taka');
        $tickettaka=Ticketearn::whereDate('created_at',$currentDate)->sum('taka');
        $accessories=Accessories::whereDate('created_at',$currentDate)->sum('ticket_price');
        $totalearn=$tickettaka+$accessories;
        $totalcost=$countermansalary+$carcostadd+$driversalary+$helpersalary+$linemansalary+$gpcost+$counterCostAdd;
        $profit=$totalearn-$totalcost;
        $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
        $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $wtickettaka=Ticketearn::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $waccessories=Accessories::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('ticket_price');
        $wcountermansalary=Countermansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $wdriversalary=Driversalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $whelpersalary=Helpersalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $wlinemansalary=Linemansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $wgpcost=Gpcost::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $wcounterCostAdd=CounterCostAdd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $wcarcostadd=Costadd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $wtotalcost=$wcountermansalary+$wcarcostadd+$wdriversalary+$whelpersalary+$wlinemansalary+$wgpcost+$wcounterCostAdd;
        $wtotalearn=$wtickettaka+$waccessories;
        $weekprofit=$wtotalearn-$wtotalcost;

        $mtickettaka=Ticketearn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $maccessories=Accessories::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('ticket_price');
        $mcountermansalary=Countermansalary::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $mdriversalary=Driversalary::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $mhelpersalary=Helpersalary::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $mlinemansalary=Linemansalary::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $mgpcosted=Gpcost::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $mcounterCostAdd=CounterCostAdd::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $mcarcostadd=Costadd::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $mtotalearn=$mtickettaka+$maccessories;
        $mtotalcost=$mcountermansalary+$mcarcostadd+$mdriversalary+$mhelpersalary+$mlinemansalary+$mgpcosted+$mcounterCostAdd;
        $mprofit=$mtotalearn-$mtotalcost;


        $ytickettaka=Ticketearn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $yaccessories=Accessories::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('ticket_price');
        $ycountermansalary=Countermansalary::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $ydriversalary=Driversalary::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $yhelpersalary=Helpersalary::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $ylinemansalary=Linemansalary::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $ygpcosted=Gpcost::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $ycounterCostAdd=CounterCostAdd::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $ycarcostadd=Costadd::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $yearearn=$ytickettaka+$yaccessories;
        $yearcost=$ycountermansalary+$ydriversalary+$yhelpersalary+$ylinemansalary+$ygpcosted+$ycounterCostAdd+$ycarcostadd;
        $yearprofit=$yearearn-$yearcost;


        $ttickettaka=Ticketearn::latest()
          ->sum('taka');
        $taccessories=Accessories::latest()
          ->sum('ticket_price');
        $tcountermansalary=Countermansalary::latest()->sum('taka');
        $tdriversalary=Driversalary::latest()->sum('taka');
        $thelpersalary=Helpersalary::latest()->sum('taka');
        $tlinemansalary=Linemansalary::latest()->sum('taka');
        $tgpcosted=Gpcost::latest()->sum('taka');
        $tcounterCostAdd=CounterCostAdd::latest()->sum('taka');
        $tcarcostadd=Costadd::latest()->sum('taka');

        $tearn=$ttickettaka+$taccessories;
        $tcost=$tcountermansalary+$tdriversalary+$thelpersalary+$tlinemansalary+$tgpcosted+$tcounterCostAdd+$tcarcostadd;
        $tprofit=$tearn-$tcost;

    	return view('admin.pages.allprofit.todayprofit',compact('profit','weekprofit','mprofit','yearprofit','tprofit'));
    }
}
