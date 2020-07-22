<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Model\Counter;
use Brian2694\Toastr\Facades\Toastr;
class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter=Counter::latest()->get();
        return view('admin.pages.counter.counter-info',compact('counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.pages.counter.index');
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
            'name'=>'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withinput();
        }

        $counter=new Counter();
        $counter->name=$request->name;
        $counter->address=$request->address;
        $counter->save();
        Toastr::success('আপনার ডাটা  সফল  ভাবে টেবিল এ যুক্ত করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('counter.index');
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
        $counter=Counter::findOrfail($id);
        return view('admin.pages.counter.edit',compact('counter'));
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
            'name'=>'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withinput();
        }

        $counter=Counter::findOrfail($id);
        $counter->name=$request->name;
        $counter->address=$request->address;
        $counter->save();
        Toastr::success('কাউন্টার  ইনফরমেশনটি সফলভাবে পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('counter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Counter::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
