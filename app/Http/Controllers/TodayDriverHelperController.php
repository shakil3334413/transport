<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Model\TodayDriverHelper;
use App\Model\DriverInfo;
use App\Model\HelperInfo;
use App\Model\Bus;
class TodayDriverHelperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver=DriverInfo::all();
        $helper=HelperInfo::all();
        $carinfo=Bus::all();
        return view('admin.pages.todaydriverhelper.index',compact('driver','helper','carinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentDate = Carbon::now()->toDateString();
        $driver=DriverInfo::all();
        $helper=HelperInfo::all();
        $carinfo=Bus::all();
        $driverhelper=TodayDriverHelper::latest()->whereDate('created_at',$currentDate)->get();
        return view('admin.pages.todaydriverhelper.info',compact('driverhelper','driver','helper','carinfo'));
    }
    public function info()
    {
        $alldrihel=TodayDriverHelper::all();
        return view('admin.pages.todaydriverhelper.all-info',compact('alldrihel'));
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
            'driver_id'=>'required',
            'helper_id'=>'required',
            'bus_id'=>'required',

        ]);
        if($Validate->fails()){
            return redirect()->back()->withErrors($Validate)->withinput();
        }
        $date = Carbon::now()->format('y-m-d');
        $driverhelpers=new TodayDriverHelper();
        $driverhelpers->date=$request->date ??$date;
        $driverhelpers->driver_id=$request->driver_id;
        $driverhelpers->helper_id=$request->helper_id;
        $driverhelpers->bus_id=$request->bus_id;
        $driverhelpers->save();
        Toastr::success('আপনার ইনপরমেশন সফল ভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('driverhelper.create');
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
        $driver=DriverInfo::all();
        $helper=HelperInfo::all();
        $carinfo=Bus::all();
        $driverhelper=TodayDriverHelper::find($id);
        return view('admin.pages.todaydriverhelper.edit',compact('driverhelper','driver','helper','carinfo'));
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
        $Validate=Validator::make($request->all(),[
            'driver_id'=>'required',
            'helper_id'=>'required',
            'bus_id'=>'required',

        ]);
        if($Validate->fails()){
            return redirect()->back()->withErrors($Validate)->withinput();
        }
        $driverhelpers=TodayDriverHelper::findOrFail($id);
        $driverhelpers->driver_id=$request->driver_id;
        $driverhelpers->helper_id=$request->helper_id;
        $driverhelpers->bus_id=$request->bus_id;
        $driverhelpers->save();
        Toastr::success('আপনার ইনপরমেশন সফল ভাবে পরিবর্তন   করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('driverhelper.create');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TodayDriverHelper::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success' );
        return back();
    }
}
