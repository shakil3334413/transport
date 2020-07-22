<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Model\Owner;
use App\Model\AccessoriesEarn;
use App\Model\AllBusCost;
use App\Model\Bus;
use App\Model\BusTripNumber;
use App\Model\CheckerInfo;
use App\Model\CheckerSalary;
use App\Model\CheckPost;
use App\Model\CostAdd;
use App\Model\CostList;
use App\Model\Counter;
use App\Model\CounterCost;
use App\Model\CounterCostAdd;
use App\Model\CounterCostList;
use App\Model\CounterManInfo;
use App\Model\CounterManSalary;
use App\Model\DriverInfo;
use App\Model\DriverSalary;
use App\Model\Earn;
use App\Model\GpCostAdd;
use App\Model\HelperInfo;
use App\Model\HelperSalary;
use App\Model\OwnerAdvance;
use App\Model\OwnerBus;
use App\Model\TicketEarn;
use App\Model\TodayBusCheck;
use App\Model\TodayDriverHelper;
use Brian2694\Toastr\Facades\Toastr;
use Charts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $total=array();
       $total['owner']=Owner::count();
       $total['counter']=Counter::count();
       $total['driver']=DriverInfo::count();
       $total['helper']=HelperInfo::count();
       $total['checkpost']=Checkpost::count();
       $total['carinfo']=Bus::count();
       $currentDate = Carbon::now()->toDateString();
       $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
       $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
       $todaytickettaka=Ticketearn::whereDate('created_at',$currentDate)->sum('total_amount');
       $todayaccessories=AccessoriesEarn::whereDate('created_at',$currentDate)->sum('total_amount');
       $todaytotalearn=$todaytickettaka+$todayaccessories;
       $tcountermansalary=Countermansalary::whereDate('created_at',$currentDate)->sum('taka');
       $tdriversalary=Driversalary::whereDate('created_at',$currentDate)->sum('taka');
       $thelpersalary=Helpersalary::whereDate('created_at',$currentDate)->sum('taka');
       $tlinemansalary=CheckerSalary::whereDate('created_at',$currentDate)->sum('taka');
       $tgpcost=GpCostAdd::whereDate('created_at',$currentDate)->sum('taka');
       $tcounterCostAdd=CounterCostAdd::whereDate('created_at',$currentDate)->sum('taka');
       $tcarcostadd=Costadd::whereDate('created_at',$currentDate)->sum('taka'); 
       $todaytotal=$tcountermansalary+$tdriversalary+$thelpersalary+$tlinemansalary+$tcounterCostAdd+$tgpcost+$tcarcostadd;
       $weektickettaka=Ticketearn::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('total_amount');
       $weekaccessories=AccessoriesEarn::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('total_amount');

       $weektotalearn=$weektickettaka+$weekaccessories;

        $weekcountermansalary=Countermansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekdriversalary=Driversalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekhelpersalary=Helpersalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weeklinemansalary=CheckerSalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekgpcost=GpCostAdd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekcounterCostAdd=CounterCostAdd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekcarcostadd=Costadd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weektotalcost=$weekcountermansalary+$weekdriversalary+$weekhelpersalary+$weeklinemansalary+$weekgpcost+$weekcounterCostAdd+$weekcarcostadd;

        $monthtickettaka=Ticketearn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('total_amount');
        $monthaccessories=AccessoriesEarn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('total_amount');
        $monthtotalearn=$monthtickettaka+$monthaccessories;
        $mcountermansalary=Countermansalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mdriversalary=Driversalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mhelpersalary=Helpersalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mlinemansalary=CheckerSalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mgpcost=GpCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mcounterCostAdd=CounterCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mcarcostadd=Costadd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mtotalcost=$mcountermansalary+$mdriversalary+$mhelpersalary+$mlinemansalary+$mgpcost+$mcounterCostAdd+$mcarcostadd;
        $ycountermansalary=Countermansalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ydriversalary=Driversalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $yhelpersalary=Helpersalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ylinemansalary=CheckerSalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ygpcost=GpCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ycounterCostAdd=CounterCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ycarcostadd=Costadd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ytotal=$ycountermansalary+$ydriversalary+$yhelpersalary+$ylinemansalary+$ygpcost+$ycounterCostAdd+$ycarcostadd;

        $ytickettaka=Ticketearn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('total_amount');
        $yaccessories=AccessoriesEarn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('total_amount');
        $ytotalearn=$ytickettaka+$yaccessories;
        $taccessories=AccessoriesEarn::latest()
          ->sum('total_amount');
        $ttickettaka=Ticketearn::latest()
          ->sum('total_amount');
        $ttotalearn=$taccessories+$ttickettaka;

        $tcountermansalary=Countermansalary::latest()
          ->sum('taka');
        $tdriversalary=Driversalary::latest()
          ->sum('taka');
        $thelpersalary=Helpersalary::latest()
          ->sum('taka');
        $tlinemansalary=CheckerSalary::latest()
          ->sum('taka');
        $tgpcost=GpCostAdd::latest()
          ->sum('taka');
        $tcounterCostAdd=CounterCostAdd::latest()
          ->sum('taka');
        $tcarcostadd=Costadd::latest()
          ->sum('taka');
        $ttotal=$tcountermansalary+$tcarcostadd+$tdriversalary+$thelpersalary+$tlinemansalary+$tgpcost+$tcounterCostAdd;


        return view('admin.layouts.home',compact('total','todaytotalearn','todaytotal','weektotalearn','weektotalcost','monthtotalearn','mtotalcost','ytotal','ytotalearn','ttotalearn','ttotal'));
    }
    public function chart()
    {
      $total=array();
       $total['owner']=Owner::count();
       $total['counter']=Counter::count();
       $total['driver']=DriverInfo::count();
       $total['helper']=HelperInfo::count();
       $total['checkpost']=Checkpost::count();
       $total['carinfo']=Bus::count();
       $currentDate = Carbon::now()->toDateString();
       $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
       $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
       $todaytickettaka=Ticketearn::whereDate('created_at',$currentDate)->sum('total_amount');
       $todayaccessories=AccessoriesEarn::whereDate('created_at',$currentDate)->sum('total_amount');
       $todaytotalearn=$todaytickettaka+$todayaccessories;
       $tcountermansalary=Countermansalary::whereDate('created_at',$currentDate)->sum('taka');
       $tdriversalary=Driversalary::whereDate('created_at',$currentDate)->sum('taka');
       $thelpersalary=Helpersalary::whereDate('created_at',$currentDate)->sum('taka');
       $tlinemansalary=CheckerSalary::whereDate('created_at',$currentDate)->sum('taka');
       $tgpcost=GpCostAdd::whereDate('created_at',$currentDate)->sum('taka');
       $tcounterCostAdd=CounterCostAdd::whereDate('created_at',$currentDate)->sum('taka');
       $tcarcostadd=Costadd::whereDate('created_at',$currentDate)->sum('taka'); 
       $todaytotal=$tcountermansalary+$tdriversalary+$thelpersalary+$tlinemansalary+$tcounterCostAdd+$tgpcost+$tcarcostadd;
       $weektickettaka=Ticketearn::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('total_amount');
       $weekaccessories=AccessoriesEarn::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('total_amount');

       $weektotalearn=$weektickettaka+$weekaccessories;

        $weekcountermansalary=Countermansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekdriversalary=Driversalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekhelpersalary=Helpersalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weeklinemansalary=CheckerSalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekgpcost=GpCostAdd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekcounterCostAdd=CounterCostAdd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weekcarcostadd=Costadd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $weektotalcost=$weekcountermansalary+$weekdriversalary+$weekhelpersalary+$weeklinemansalary+$weekgpcost+$weekcounterCostAdd+$weekcarcostadd;

        $monthtickettaka=Ticketearn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('total_amount');
        $monthaccessories=AccessoriesEarn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('total_amount');
        $monthtotalearn=$monthtickettaka+$monthaccessories;
        $mcountermansalary=Countermansalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mdriversalary=Driversalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mhelpersalary=Helpersalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mlinemansalary=CheckerSalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mgpcost=GpCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mcounterCostAdd=CounterCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mcarcostadd=Costadd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $mtotalcost=$mcountermansalary+$mdriversalary+$mhelpersalary+$mlinemansalary+$mgpcost+$mcounterCostAdd+$mcarcostadd;
        $ycountermansalary=Countermansalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ydriversalary=Driversalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $yhelpersalary=Helpersalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ylinemansalary=CheckerSalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ygpcost=GpCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ycounterCostAdd=CounterCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ycarcostadd=Costadd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $ytotal=$ycountermansalary+$ydriversalary+$yhelpersalary+$ylinemansalary+$ygpcost+$ycounterCostAdd+$ycarcostadd;

        $ytickettaka=Ticketearn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('total_amount');
        $yaccessories=AccessoriesEarn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('total_amount');
        $ytotalearn=$ytickettaka+$yaccessories;
        $taccessories=AccessoriesEarn::latest()
          ->sum('total_amount');
        $ttickettaka=Ticketearn::latest()
          ->sum('total_amount');
        $ttotalearn=$taccessories+$ttickettaka;

        $tcountermansalary=Countermansalary::latest()
          ->sum('taka');
        $tdriversalary=Driversalary::latest()
          ->sum('taka');
        $thelpersalary=Helpersalary::latest()
          ->sum('taka');
        $tlinemansalary=CheckerSalary::latest()
          ->sum('taka');
        $tgpcost=GpCostAdd::latest()
          ->sum('taka');
        $tcounterCostAdd=CounterCostAdd::latest()
          ->sum('taka');
        $tcarcostadd=Costadd::latest()
          ->sum('taka');
        $ttotal=$tcountermansalary+$tcarcostadd+$tdriversalary+$thelpersalary+$tlinemansalary+$tgpcost+$tcounterCostAdd;

      $pie = Charts::create('pie', 'highcharts')
          ->title('সর্বমোট আয় & খরচ.')
          ->labels(['সর্বমোট আয়', 'সর্বমোট খরচ'])
          ->values([$ttotalearn,$ttotal])
          ->dimensions(0,300)
          ->responsive(false);
      $piee = Charts::create('pie', 'highcharts')
          ->title('সর্বমোট সংখ্যা.')
          ->labels(['মালিক সংখ্যা','ড্রাইভার সংখ্যা','হেল্পার সংখ্যা','কাউন্টার সংখ্যা','গাডির  সংখ্যা','চেকপোস্ট সংখ্যা'])
          ->values([$total['owner'],$total['driver'],$total['helper'],$total['counter'],$total['carinfo'],$total['checkpost']])
          ->dimensions(0,300)
          ->responsive(false);
      $chart = Charts::create('bar', 'highcharts')
          ->title("সকল হিসাবের  চার্ট .")
          ->elementLabel("সকল হিসাবের  চার্ট .")
          ->dimensions(0,500)
          ->responsive(false)
          ->values([$todaytotalearn,$todaytotal,$weektotalearn,$weektotalcost,$monthtotalearn,$mtotalcost,$ytotal,$ytotalearn,$ttotalearn,$ttotal])
          ->labels(['আজকের আয়','আজকের খরচ','সপ্তায়ে মোট আয়','সপ্তায়ে মোট খরচ',' মাসের মোট আয়','মাসের মোট খরচ','বছরের মোট খরচ','বছরের মোট আয়','সর্বমোট আয়','সর্বমোট খরচ']);

      return view('admin.pages.dashboard.chart',compact('total','todaytotalearn','todaytotal','weektotalearn','weektotalcost','monthtotalearn','mtotalcost','ytotal','ytotalearn','ttotalearn','ttotal','chart','pie','piee'));
    }
    
}
