<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Counter;
use App\Model\Bus;
use App\Model\Earn;
use App\Model\TicketEarn;
use Brian2694\Toastr\Facades\Toastr;
class TicketIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate = Carbon::now()->toDateString();
        $counttaka=TicketEarn::whereDate('created_at',$currentDate)->sum('total_amount');
        $ticket_number=Ticketearn::whereDate('created_at',$currentDate)->sum('total_ticket');
        $ticketearn=Ticketearn::latest()
        ->whereDate('created_at',$currentDate)
        ->get();
        return view('admin.pages.ticketearn.list',compact('ticketearn','counttaka','ticket_number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $counter=Counter::all();
        $ticketearn=Ticketearn::all();
        return view('admin.pages.ticketearn.index',compact('counter','carinfo','ticketearn'));
        
    }
     public function all_list()
    {
        $ticketearn=Ticketearn::latest()->get();
        $counttaka=Ticketearn::sum('total_amount');
        $ticket_number=Ticketearn::sum('total_ticket');
        return view('admin.pages.ticketearn.all-list',compact('ticketearn','counttaka','ticket_number'));
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
            'ticket_number' => 'required',
            'price' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $ticketearn=new Ticketearn();
        $ticketearn->counter_name=$request->counter_name;
        $ticketearn->shift=$request->shift;
        $ticketearn->ticket_number=$request->ticket_number;
        $ticketearn->price=$request->price;
        $taka=$request->ticket_number*$request->price;
        $ticketearn->taka=$taka;
        $ticketearn->save();
        Toastr::success('টিকেট থেকে আয় সফলভাবে  যুক্ত করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('ticketearn.index');

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
        $counter=Counter::all();
        $ticketearn=Ticketearn::findOrfail($id);
        return view('admin.pages.ticketearn.edit',compact('ticketearn','counter','carinfo'));

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
            'ticket_number' => 'required',
            'price' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $ticketearn=Ticketearn::findOrfail($id);
        $ticketearn->counter_name=$request->counter_name;
        $ticketearn->shift=$request->shift;
        $ticketearn->ticket_number=$request->ticket_number;
        $ticketearn->price=$request->price;
        $taka=$request->ticket_number*$request->price;
        $ticketearn->taka=$taka;
        $ticketearn->save();
        Toastr::success('আপনার ইনফরমেশন সফলভাবে পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('ticketearn.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticketearn::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
