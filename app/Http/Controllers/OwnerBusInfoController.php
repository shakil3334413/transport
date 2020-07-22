<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Model\Bus;
use App\Model\Owner;
use App\Model\OwnerBus;
use Illuminate\Support\Facades\Validator;
class OwnerBusInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ownerbus=[];
        $Ownerbus['buses']=OwnerBus::latest()
        ->get();
        return view('admin.pages.ownerbusinfo.owner-bus-info',$Ownerbus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners=[];
        $owners['owners']=Owner::all();
        $buses=[];
        $buses['buses']=Bus::all();
        return view('admin.pages.ownerbusinfo.index',$buses,$owners);
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
         'owner_id' => 'required',
         'bus_id' => 'required',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $ownerbus = new OwnerBus();
        $ownerbus->owner_id=$request->owner_id;
        $ownerbus->bus_id=$request->bus_id;
        $ownerbus->save();
        Toastr::success('মালিকের গাড়ী ইনফর্মেশন সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('ownerbus.index');
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

        $owners=Owner::all();
        $buses=Bus::all();
        $ownerbus=OwnerBus::find($id);
        return view('admin.pages.ownerbusinfo.edit',compact('ownerbus','owners','buses'));
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
         'owner_id' => 'required',
         'bus_id' => 'required',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $ownerbus =  OwnerBus::findOrfail($id);
        $ownerbus->owner_id=$request->owner_id;
        $ownerbus->bus_id=$request->bus_id;
        $ownerbus->save();
        Toastr::success('মালিকের গাড়ীর ইনফর্মেশন সফলভাবে পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('ownerbus.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OwnerBus::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
