<?php

namespace App\Http\Controllers\Report;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driversalary;
use App\Carinfo;
use App\Driver;
use App\Helpersalary;
use App\Helper;
use App\Linemansalary;
use App\Countermansalary;
use App\Accessories;
use App\Ticketearn;
use App\CounterCostAdd;
use App\Costadd;
use Carbon\Carbon;
class ReportController extends Controller
{
    public function daydriver()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $counttaka=Driversalary::whereDate('created_at',$currentDate)->sum('taka');
        $driversalary=Driversalary::latest()
        ->whereDate('created_at',$currentDate)
        ->get();
        return view('admin.pages.report.daydriverbeton',compact('currentDatetime','counttaka','driversalary'));
    }

    public function weekdriver()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
        $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $counttaka=Driversalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $driversalary=Driversalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->get();
        return view('admin.pages.report.weekdriver',compact('currentDatetime','counttaka','driversalary'));

    }

    public function montdriver()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $counttaka=Driversalary::latest()
        ->whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)
        ->sum('taka');
        $driversalary=Driversalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->get();
        return view('admin.pages.report.monthdriver',compact('currentDatetime','counttaka','driversalary'));

    }

    public function dayhelper()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $counttaka=Helpersalary::whereDate('created_at',$currentDate)->sum('taka');
        $helperalary=Helpersalary::latest()
        ->whereDate('created_at',$currentDate)
        ->get();
        return view('admin.pages.report.dayhelpar',compact('currentDatetime','counttaka','helperalary'));
    }
    public function weekhelper()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
        $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $counttaka=Helpersalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $helperalary=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->get();
        return view('admin.pages.report.weekhelper',compact('currentDatetime','counttaka','helperalary'));
    }

    public function monthhelper()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $counttaka=Helpersalary::latest()
        ->whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)
        ->sum('taka');
        $helperalary=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->get();
        return view('admin.pages.report.monthhelper',compact('currentDatetime','counttaka','helperalary'));

    }

    public function daylineman()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $counttaka=Linemansalary::whereDate('created_at',$currentDate)->sum('taka');
        $linemansalary=Linemansalary::latest()
        ->whereDate('created_at',$currentDate)
        ->get();
        return view('admin.pages.report.daylineman',compact('currentDatetime','counttaka','linemansalary'));
    }
    public function weeklineman()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
        $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $counttaka=Linemansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $linemansalary=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->get();
        return view('admin.pages.report.weeklineman',compact('currentDatetime','counttaka','linemansalary'));
    }

    public function monthlineman()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $counttaka=Linemansalary::latest()
        ->whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)
        ->sum('taka');
        $linemansalary=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->get();
        return view('admin.pages.report.monthlineman',compact('currentDatetime','counttaka','linemansalary'));

    }

    public function daycounterman()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $counttaka=Countermansalary::whereDate('created_at',$currentDate)->sum('taka');
        $countermansalary=Countermansalary::latest()
        ->whereDate('created_at',$currentDate)
        ->get();
        return view('admin.pages.report.daycounterman',compact('currentDatetime','counttaka','countermansalary'));
    }
    public function weekcounterman()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
        $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $counttaka=Countermansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $countermansalary=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->get();
        return view('admin.pages.report.weekcounterman',compact('currentDatetime','counttaka','countermansalary'));
    }
    public function monthcounterman()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $counttaka=Countermansalary::latest()
        ->whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)
        ->sum('taka');
        $countermansalary=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->get();
        return view('admin.pages.report.monthcounterman',compact('currentDatetime','counttaka','countermansalary'));

    }

    public function monthincomereport()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $tickets=Ticketearn::latest()
        ->whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)->get();
        $tickettaka=Ticketearn::latest()
        ->whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)
        ->sum('taka');
        $acce=Accessories::latest()
        ->whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)
        ->get();
        $accessories=Accessories::latest()
        ->whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)
        ->sum('ticket_price');

        $totalearn=$tickettaka+$accessories;
        return view('admin.pages.report.monthincomereport',compact('currentDatetime','tickets','tickettaka','acce','accessories'));
    }

    public function monthkhorochreport()
    {
        $currentDatetime = Carbon::now();
        $currentDate= Carbon::now()->toDateString();
        $counter=Countermansalary::latest()
        ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->get();
        $driver=Driversalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->get();
        $helper=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->get();
        $lineman=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->get();
        $counterCost=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->get();
        $carcost=Costadd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->get();
        $countermansalary=Countermansalary::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $driversalary=Driversalary::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $helpersalary=Helpersalary::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $linemansalary=Linemansalary::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $counterCostAdd=CounterCostAdd::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        $carcostadd=Costadd::whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->sum('taka');
        return view('admin.pages.report.monthkhorochreport',compact('currentDatetime','counter','driver','helper','lineman','counterCost','carcost','countermansalary','driversalary','helpersalary','linemansalary','counterCostAdd','carcostadd'));
    }
}
