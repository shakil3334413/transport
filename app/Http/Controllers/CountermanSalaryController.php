<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Countermansalary;
use App\CounterMan;
use App\Counter;
use Carbon\Carbon;
class CountermanSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate= Carbon::now()->toDateString();
        $counttaka=Countermansalary::whereDate('created_at',$currentDate)->sum('taka');
        $countermansalary=Countermansalary::latest()
        ->whereDate('created_at',$currentDate)
        ->get();
        return view('admin.pages.allsalary.countermansalary.index',compact('countermansalary','counttaka'));
    }

    public function all_info()
    {
        $countermansalary= Countermansalary::latest()->get();
        $counttaka=Countermansalary::sum('taka');
        return view('admin.pages.allsalary.countermansalary.all-info',compact('countermansalary','counttaka'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countermansalary=Countermansalary::all();
        $counterman=CounterMan::all();
        $counter=Counter::all();
        return view('admin.pages.allsalary.countermansalary.create',compact('countermansalary','counterman','counter'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'taka' => 'required'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $countermansalary = new Countermansalary();
        $countermansalary->name=$request->name; 
        $countermansalary->counter_name=$request->counter_name;
        $countermansalary->shift=$request->shift;  
        $countermansalary->taka=$request->taka; 
        $countermansalary->save();
        Toastr::success('কাউন্টার ম্যানের বেতন সফলভাবে যুক্ত করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('countermansalary.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $counterman=CounterMan::all();
        $counter=Counter::all();
        $countermansalary = Countermansalary::find($id);
        return view('admin.pages.allsalary.countermansalary.edit',compact('countermansalary','counterman','counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate=Validator::make($request->all(),[
            'taka' => 'required'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $countermansalary = Countermansalary::find($id);
        $countermansalary->name=$request->name; 
        $countermansalary->counter_name=$request->counter_name; 
        $countermansalary->shift=$request->shift;
        $countermansalary->taka=$request->taka; 
        $countermansalary->save();
        Toastr::success('আপনার ইনফরমেশন সফলভাবে পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('countermansalary.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Countermansalary::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
