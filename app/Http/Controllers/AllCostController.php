<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Countermansalary;
use App\Driversalary;
use App\Helpersalary;
use App\Linemansalary;
use App\CounterCostAdd;
use App\Costadd;
class AllCostController extends Controller
{
    //
     public function today()
    {
        $currentDate = Carbon::now()->toDateString();
        $countermansalary=Countermansalary::whereDate('created_at',$currentDate)->sum('taka');
        $driversalary=Driversalary::whereDate('created_at',$currentDate)->sum('taka');
        $helpersalary=Helpersalary::whereDate('created_at',$currentDate)->sum('taka');
        $linemansalary=Linemansalary::whereDate('created_at',$currentDate)->sum('taka');
        $counterCostAdd=CounterCostAdd::whereDate('created_at',$currentDate)->sum('taka');
        $carcostadd=Costadd::whereDate('created_at',$currentDate)->sum('taka');
        $total=$countermansalary+$carcostadd+$driversalary+$helpersalary+$linemansalary+$counterCostAdd;
    	return view('admin.pages.all-cost.today-cost',compact('countermansalary','driversalary','helpersalary','linemansalary','gpcost','counterCostAdd','carcostadd','total'));
    }
    public function week()
    {
          $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
          $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $countermansalary=Countermansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $driversalary=Driversalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $helpersalary=Helpersalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $linemansalary=Linemansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $counterCostAdd=CounterCostAdd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $carcostadd=Costadd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
        $total=$countermansalary+$carcostadd+$driversalary+$helpersalary+$linemansalary+$counterCostAdd;
    	return view('admin.pages.all-cost.week-cost',compact('countermansalary','driversalary','helpersalary','linemansalary','gpcost','counterCostAdd','carcostadd','total'));
    }
    public function month()
    {
        $countermansalary=Countermansalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $driversalary=Driversalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $helpersalary=Helpersalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $linemansalary=Linemansalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $counterCostAdd=CounterCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $carcostadd=Costadd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('taka');
        $total=$countermansalary+$carcostadd+$driversalary+$helpersalary+$linemansalary+$counterCostAdd;

    	return view('admin.pages.all-cost.month-cost',compact('countermansalary','driversalary','helpersalary','linemansalary','gpcost','counterCostAdd','carcostadd','total'));
    }
    public function year()
    {
        $countermansalary=Countermansalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $driversalary=Driversalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $helpersalary=Helpersalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $linemansalary=Linemansalary::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $counterCostAdd=CounterCostAdd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $carcostadd=Costadd::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
        $total=$countermansalary+$carcostadd+$driversalary+$helpersalary+$linemansalary+$counterCostAdd;
     	return view('admin.pages.all-cost.year-cost',compact('countermansalary','driversalary','helpersalary','linemansalary','gpcost','counterCostAdd','carcostadd','total'));
    }
    public function total()
    {
        $countermansalary=Countermansalary::latest()
          ->sum('taka');
        $driversalary=Driversalary::latest()
          ->sum('taka');
        $helpersalary=Helpersalary::latest()
          ->sum('taka');
        $linemansalary=Linemansalary::latest()
          ->sum('taka');
        $counterCostAdd=CounterCostAdd::latest()
          ->sum('taka');
        $carcostadd=Costadd::latest()
          ->sum('taka');

        $total=$countermansalary+$carcostadd+$driversalary+$helpersalary+$linemansalary+$counterCostAdd;
     	return view('admin.pages.all-cost.total-cost',compact('countermansalary','driversalary','helpersalary','linemansalary','gpcost','counterCostAdd','carcostadd','total'));
    }
    public function today_all(){
        $currentDate = Carbon::now()->toDateString();
        $counter=Countermansalary::latest()->whereDate('created_at',$currentDate)->paginate(5);
        $driver=Driversalary::latest()->whereDate('created_at',$currentDate)->paginate(5);
        $helper=Helpersalary::latest()->whereDate('created_at',$currentDate)->paginate(5);
        $lineman=Linemansalary::latest()->whereDate('created_at',$currentDate)->paginate(5);
        $counterCost=CounterCostAdd::latest()->whereDate('created_at',$currentDate)->paginate(5);
        $carcost=Costadd::latest()->whereDate('created_at',$currentDate)->paginate(5);
        $countermansalary=Countermansalary::whereDate('created_at',$currentDate)->sum('taka');
        $driversalary=Driversalary::whereDate('created_at',$currentDate)->sum('taka');
        $helpersalary=Helpersalary::whereDate('created_at',$currentDate)->sum('taka');
        $linemansalary=Linemansalary::whereDate('created_at',$currentDate)->sum('taka');
        $counterCostAdd=CounterCostAdd::whereDate('created_at',$currentDate)->sum('taka');
        $carcostadd=Costadd::whereDate('created_at',$currentDate)->sum('taka');

        return view('admin.pages.all-cost.today-all',compact('countermansalary','driversalary','helpersalary','linemansalary','counterCostAdd','carcostadd','counter','driver','helper','lineman','counterCost','carcost'));
    }
    public function week_all(){
        $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
        $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $currentDate = Carbon::now()->toDateString();
        $counter=Countermansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->paginate(5);
        $driver=Driversalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->paginate(5);
        $helper=Helpersalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->paginate(5);
        $lineman=Linemansalary::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->paginate(5);
        $counterCost=CounterCostAdd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->paginate(5);
        $carcost=Costadd::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->paginate(5);
        $countermansalary=Countermansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->sum('taka');
        $driversalary=Driversalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->sum('taka');
        $helpersalary=Helpersalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->sum('taka');
        $linemansalary=Linemansalary::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->sum('taka');
        $counterCostAdd=CounterCostAdd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->sum('taka');
        $carcostadd=Costadd::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->sum('taka');

        return view('admin.pages.all-cost.week-all',compact('countermansalary','driversalary','helpersalary','linemansalary','counterCostAdd','carcostadd','counter','driver','helper','lineman','counterCost','carcost'));
    }
    public function month_all(){
        $counter=Countermansalary::latest()
        ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->paginate(5);
        $driver=Driversalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->paginate(5);
        $helper=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->paginate(5);
        $lineman=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->paginate(5);
        $counterCost=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->paginate(5);
        $carcost=Costadd::latest()->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)->paginate(5);
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

        return view('admin.pages.all-cost.month-all',compact('countermansalary','driversalary','helpersalary','linemansalary','counterCostAdd','carcostadd','counter','driver','helper','lineman','counterCost','carcost'));
    }
    public function year_all(){
        $counter=Countermansalary::latest()->whereYear('created_at', Carbon::now()->year)->paginate(5);
        $driver=Driversalary::latest()->whereYear('created_at', Carbon::now()->year)->paginate(5);
        $helper=Helpersalary::latest()->whereYear('created_at', Carbon::now()->year)->paginate(5);
        $lineman=Linemansalary::latest()->whereYear('created_at', Carbon::now()->year)->paginate(5);
        $counterCost=CounterCostAdd::latest()->whereYear('created_at', Carbon::now()->year)->paginate(5);
        $carcost=Costadd::latest()->whereYear('created_at', Carbon::now()->year)->paginate(5);
        $countermansalary=Countermansalary::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $driversalary=Driversalary::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $helpersalary=Helpersalary::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $linemansalary=Linemansalary::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $counterCostAdd=CounterCostAdd::whereYear('created_at', Carbon::now()->year)->sum('taka');
        $carcostadd=Costadd::whereYear('created_at', Carbon::now()->year)->sum('taka');

        return view('admin.pages.all-cost.year-all',compact('countermansalary','driversalary','helpersalary','linemansalary','counterCostAdd','carcostadd','counter','driver','helper','lineman','counterCost','carcost'));
    }
    public function total_all(){
        $counter=Countermansalary::latest()->paginate(5);
        $driver=Driversalary::latest()->paginate(5);
        $helper=Helpersalary::latest()->paginate(5);
        $lineman=Linemansalary::latest()->paginate(5);
        $counterCost=CounterCostAdd::latest()->paginate(5);
        $carcost=Costadd::latest()->paginate(5);
        $countermansalary=Countermansalary::latest()->sum('taka');
        $driversalary=Driversalary::latest()->sum('taka');
        $helpersalary=Helpersalary::latest()->sum('taka');
        $linemansalary=Linemansalary::latest()->sum('taka');
        $counterCostAdd=CounterCostAdd::latest()->sum('taka');
        $carcostadd=Costadd::latest()->sum('taka');

        return view('admin.pages.all-cost.total-all',compact('countermansalary','driversalary','helpersalary','linemansalary','counterCostAdd','carcostadd','counter','driver','helper','lineman','counterCost','carcost'));
    }
}
