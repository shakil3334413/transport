<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Model\CostList;
class CostListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costnames=CostList::all();
        return view('admin.pages.costlist.carcostlist',compact('costnames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.costlist.carcostcreate');
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
            'cost_name'=>'required'
        ]);
        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withinput();
        }
        $costname=new CostList();
        $costname->cost_name=$request->cost_name;
        $costname->cost_details=$request->cost_details;
        $costname->save();
        Toastr::success('আপনার ডাটা সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('costlist.index');

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
        $costname=CostList::findOrfail($id);
        return view('admin.pages.costlist.edit',compact('costname'));
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
            'cost_name'=>'required'
        ]);
        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withinput();
        }
        $costname=CostList::findOrfail($id);
        $costname->cost_name=$request->cost_name;
        $costname->cost_details=$request->cost_details;
        $costname->save();
        Toastr::success('আপনার ইনফরমেশনটি সফলভাবে  পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('costlist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CostList::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
