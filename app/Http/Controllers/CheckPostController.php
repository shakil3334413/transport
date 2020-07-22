<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Model\Checkpost;
use Illuminate\Support\Facades\Validator;
class CheckPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // temporaly function
    public function index()
    {
        $checkpost=Checkpost::latest()->paginate(20);
        return view('admin.pages.checkpost.checkpost-info',compact('checkpost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.checkpost.index');
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
        $Validate=Validator::make($request->all(),[
            'name'=>'required',

        ]);
        if($Validate->fails()){
            return redirect()->back()->withErrors($Validate)->withinput();
        }

        $checkpost=new Checkpost();
        $checkpost->name=$request->name;
        $checkpost->address=$request->address;
        $checkpost->save();
        Toastr::success('চেক পোস্ট ইনফরমেশন সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('checkpost.index');
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
        //
         $checkpost=Checkpost::findOrfail($id);
        return view('admin.pages.checkpost.edit',compact('checkpost'));
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
            'name'=>'required',

        ]);
        if($Validate->fails()){
            return redirect()->back()->withErrors($Validate)->withinput();
        }

        $checkpost=Checkpost::findOrfail($id);
        $checkpost->name=$request->name;
        $checkpost->address=$request->address;
        $checkpost->save();
        Toastr::success('আপনার ইনফরমেশন সফলভাবে পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('checkpost.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Checkpost::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
