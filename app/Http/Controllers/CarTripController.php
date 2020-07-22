<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use App\Model\Bus;
use App\Model\BusTripNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
class CarTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate = Carbon::now()->toDateString();
        $counttrip=BusTripNumber::whereDate('created_at',$currentDate)->sum('trip_number');
        $cartrip=BusTripNumber::latest()
        ->whereDate('created_at',$currentDate)
        ->get();
        return view('admin.pages.cartrip.index',compact('cartrip','counttrip'));
    }

    public function info()
    {
        $counttrip=BusTripNumber::sum('trip_number');
        $cartrip=BusTripNumber::latest()->get();
        return view('admin.pages.cartrip.cartripall',compact('cartrip','counttrip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carnumber= Bus::all();
        $cartrip= BusTripNumber::all();
        return view('admin.pages.cartrip.create',compact('cartrip','carnumber'));
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
            'trip_number' => 'required'
        ]);
        $date = Carbon::now();
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $cartrip = new BusTripNumber();
        $cartrip->bus_id=$request->bus_id; 
        $cartrip->trip_number=$request->trip_number;
        $cartrip->trip_date=$request->trip_date ?? $date;
        $cartrip->save();
        Toastr::success('গাডির ট্রিপ লিস্টের তালিকা সফলভাবে যুক্ত করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('cartrip.index'); 
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
         $carnumber= Bus::all();
         $cartrip = BusTripNumber::find($id);
         return view('admin.pages.cartrip.edit',compact('cartrip','carnumber'));
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
            'trip_number' => 'required'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $olddate=$request->old_date;
        $cartrip = BusTripNumber::find($id);
        $cartrip->bus_id=$request->bus_id; 
        $cartrip->trip_number=$request->trip_number;
        $cartrip->trip_date=$request->trip_date ?? $olddate; 
        $cartrip->save();
        Toastr::success('গাডির ট্রিপ লিস্টের তালিকা সফলভাবে পরিবর্তন করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('cartrip.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BusTripNumber::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
