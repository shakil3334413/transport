<?php
namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Model\CounterCostList;
class CounterCostlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countercost=CounterCostList::latest()->get();
        return view('admin.pages.costlist.countercostlist',compact('countercost'));
    }

    /**
     *Show the form for creating a new resource.
     *
     *@return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.pages.costlist.countercostcreat');
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
            'cost_name'=>'required'
        ]);
        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withinput();
        }
        $countercost=new CounterCostList();
        
        $countercost->cost_name=$request->cost_name;
        $countercost->cost_details=$request->cost_details;
        $countercost->save();
        Toastr::success('আপনার ডাটা সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('countercostlist.index');
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
        $countercost=CounterCostList::findOrfail($id);
        return view('admin.pages.costlist.countercostedit',compact('countercost'));
        
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
            'cost_name'=>'required'
        ]);
        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withinput();
        }
        $countercost=CounterCostList::findOrfail($id);
        $countercost->cost_name=$request->cost_name;
        $countercost->cost_details=$request->cost_details;
        $countercost->save();
        Toastr::success('আপনার ডাটা সফলভাবে পরিবর্তন  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('countercostlist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CounterCostList::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
