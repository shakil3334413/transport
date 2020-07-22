<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\TodayBusCheck;
use App\Model\CheckerInfo;
use App\Model\Checkpost;
use App\Model\Bus;
class TodayCheckerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $checker=CheckerInfo::all();
        $checkpost=Checkpost::all();
        $carinfo=Bus::all();
        return view('admin.pages.todaychecker.index',compact('checker','checkpost','carinfo'));
    }
    public function info()
    {
        $allcheck= TodayBusCheck::all();
        return view('admin.pages.todaychecker.all-info',compact('allcheck'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentDate = Carbon::now()->toDateString();
        $todaycheck=TodayBusCheck::latest()
        ->whereDate('created_at',$currentDate)->get();
        return view('admin.pages.todaychecker.info',compact('todaycheck'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validate=Validator::make($request->all(),[
            'checker_id'=>'required',
            'checkpost_id'=>'required',
            'bus_id'=>'required',
        ]);
        if($Validate->fails()){
            return redirect()->back()->withErrors($Validate)->withinput();
        }
        $date = Carbon::now()->format('y-m-d');
        $time = Carbon::now()->format('h:m:s');
        $checkpost=new TodayBusCheck();
        $checkpost->cheacker_id=$request->checker_id;
        $checkpost->checkpost_id=$request->checkpost_id;
        $checkpost->bus_id=$request->bus_id;
        $checkpost->check_date=$request->check_date ?? $date; 
        $checkpost->check_time=$request->check_time ??$time;
        $checkpost->save();
        Toastr::success('আজকের চেকের  ইনফরমেশন  সফল ভাবে যুক্ত করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('todaycheck.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checker=CheckerInfo::all();
        $checkpost=Checkpost::all();
        $carinfo=Bus::all();

        $todaycheck=TodayBusCheck::find($id);
        return view('admin.pages.todaychecker.edit',compact('todaycheck','checker','checkpost','carinfo'));
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
        //
         $checkpost=TodayBusCheck::findOrfail($id);
         $checkpost->cheacker_id=$request->checker_id;
         $checkpost->checkpost_id=$request->checkpost_id;
         $checkpost->bus_id=$request->bus_id;
         $checkpost->check_date=$request->check_date;  
         $checkpost->check_time=$request->check_time;
         $checkpost->save();
        Toastr::success('আপনার ইনপরমেশন সফল ভাবে পরিবর্তন   করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('todaycheck.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TodayBusCheck::destroy($id);
         Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
