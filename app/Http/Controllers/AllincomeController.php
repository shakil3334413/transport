<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Accessories;
use App\Ticketearn;
class AllincomeController extends Controller
{
     public function today()
     {
          $currentDate = Carbon::now()->toDateString();
          $tickets=Ticketearn::latest()->whereDate('created_at',$currentDate)->get();
          $tickettaka=Ticketearn::whereDate('created_at',$currentDate)->sum('taka');
          $acce=Accessories::latest()->whereDate('created_at',$currentDate)->paginate(7);
          $accessories=Accessories::whereDate('created_at',$currentDate)->sum('ticket_price');
          $totalearn=$tickettaka+$accessories;
     	return view('admin.pages.all-income.today-income',compact('currentDate','tickettaka','accessories','totalearn','tickets','acce'));
     }
     public function week()
     {
          $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
          $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
          $tickets=Ticketearn::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->   format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                  ->get();
          $acce=Accessories::latest()->whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
               ->paginate(7);
          $tickettaka=Ticketearn::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('taka');
          $accessories=Accessories::whereBetween('created_at', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])
                ->sum('ticket_price');

          $totalearn=$tickettaka+$accessories;
     	return view('admin.pages.all-income.week-income',compact('tickettaka','accessories','totalearn','tickets','acce'));
     }
     public function month()
     {
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
          ->paginate(7);
          $accessories=Accessories::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->month)
          ->sum('ticket_price');

          $totalearn=$tickettaka+$accessories;
          return view('admin.pages.all-income.month-income',compact('tickettaka','accessories','totalearn','tickets','acce'));
     }
     public function year()
     {
          $tickets=Ticketearn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->get();
          $tickettaka=Ticketearn::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('taka');
          $acce=Accessories::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->paginate(7);
          $accessories=Accessories::latest()
          ->whereYear('created_at', Carbon::now()->year)
          ->sum('ticket_price');

          $totalearn=$tickettaka+$accessories;
          return view('admin.pages.all-income.year-income',compact('tickettaka','accessories','totalearn','tickets','acce'));
     }
     public function total()
     {
          $tickets=Ticketearn::latest()
          ->get();
          $tickettaka=Ticketearn::latest()
          ->sum('taka');
          $acce=Accessories::latest()
          ->paginate(7);
          $accessories=Accessories::latest()
          ->sum('ticket_price');
          $totalearn=$tickettaka+$accessories;
          return view('admin.pages.all-income.total-income',compact('tickettaka','accessories','totalearn','tickets','acce'));
     	
     }
}
