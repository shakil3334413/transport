<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Model\Counter;
use Illuminate\Http\Request;
use App\Model\Owner;
use App\Model\OwnerAdvance;
use Brian2694\Toastr\Facades\Toastr;
class OwnerAdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owneradvace=OwnerAdvance::all();
        return view('admin.pages.owneradvance.index',compact('owneradvace'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counter=Counter::all();
        $owner=Owner::all();
        return view('admin.pages.owneradvance.create',compact('owner','counter'));
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
         'taka' => 'required',
         'date'=>'required',
         'choice'=>'required',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $owneradvance = new OwnerAdvance();
        $owneradvance->owner_id=$request->owner_id;
        $owneradvance->counter_id=$request->counter_id;
        $owneradvance->taka=$request->taka;
        $owneradvance->date=$request->date;
        $owneradvance->choice=$request->choice;

        if($owneradvance->choice=='1'){
            $advance_nibe=OwnerAdvance::select('total_taka')->where('owner_id',$owneradvance->owner_id)->orderBy('id','desc')->first();
            if(isset($advance_nibe)){
                $owneradvance->total_taka=$owneradvance->taka+$advance_nibe->total_taka;
            }else{
                $owneradvance->total_taka=$owneradvance->taka;
            }
        }
        if($owneradvance->choice=='0'){
            $advance_nibe=OwnerAdvance::select('total_taka')->where('owner_id',$owneradvance->owner_id)->orderBy('id','desc')->first();
            if(isset($advance_nibe)){
                $owneradvance->total_taka=$advance_nibe->total_taka-$owneradvance->taka;
            }else{
                Toastr::error('Apnar Age Kno Taka Nen Nai','Error');
                return back();
            }
        }

        $owneradvance->save();
        Toastr::success('মালিকের টাকা পরিমাপ সফলভাবে যুক্ত করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('owneradvance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OwnerAdvance  $ownerAdvance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OwnerAdvance  $ownerAdvance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $counter=Counter::all();
        $owner=Owner::all();
        $owneradvace=OwnerAdvance::findOrfail($id);
        return view('admin.pages.owneradvance.edit',compact('owner','owneradvace','counter'));
        return redirect()->back()->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OwnerAdvance  $ownerAdvance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate=Validator::make($request->all(),[
         'taka' => 'required',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $owneradvance =OwnerAdvance::findOrfail($id);
        $owneradvance->owner_id=$request->owner_id;
        $owneradvance->counter_id=$request->counter_id;
        $owneradvance->taka=$request->taka;
        $owneradvance->save();
        Toastr::success('মালিকের টাকা পরিমাপ সফলভাবে পরিবর্তন  করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('owneradvance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OwnerAdvance  $ownerAdvance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OwnerAdvance::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();

    }
}
