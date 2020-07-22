<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Bus;
class CarInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //
        $buses=[];
        $buses['buses']=Bus::all();
        return view('admin.pages.car.car-info-list',$buses);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.car.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    $validate=Validator::make($request->all(),[
         'number' => 'required',
     ]);
    if($validate->fails()){
        return redirect()->back()->withErrors($validate)->withInput();
    }
    $bus = new Bus();
    $bus->model=$request->model;
    $bus->number=$request->number;
    $bus->lat=$request->lat;
    $bus->long=$request->long;
    $bus->save();
    Toastr::success('গাডির ইনফরমেশন সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
    return redirect()->route('bus.index');

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
        //
        $bus= Bus::find($id);
        return view('admin.pages.car.edit',compact('bus'));
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
        $validate=Validator::make($request->all(),[
         'number' => 'required',
         ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $bus =  Bus::findOrfail($id);
        $bus->model=$request->model;
        $bus->number=$request->number;
        $bus->lat=$request->lat;
        $bus->long=$request->long;
        $bus->save();
        Toastr::success('আপনার ইনফর্মেশন সফলভাবে পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('bus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus= Bus::find($id)->delete();
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
