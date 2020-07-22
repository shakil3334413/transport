<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Counter;
use App\Model\Earn;
use App\Model\AccessoriesEarn;
use App\Model\TicketEarn;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use auth;
class TotalearnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TicketEarn=TicketEarn::all();
        $currentDate = Carbon::now()->toDateString();
        $titcketearn=Earn::latest()->whereDate('created_at',$currentDate)->get();
        // $data['earns'] = DB::table('earns')
    	// ->select('earns.id as earnId','earns.counter_id','earns.ticket_id','earns.access_id','earns.total_earn')
    	// ->join('counters','counters.id','=','earns.counter_id')
        // ->join('ticket_earns','ticket_earns.id','=','earns.ticket_id')
        // ->join('accessories_earns','accessories_earns.id','=','earns.access_id')
    	// ->whereDate('earns.created_at',$currentDate)
        // ->orderBy('earns.id','desc')
        // ->get();
        return view('admin.pages.totalearn.index',compact('titcketearn'));
    }
    public function all_earn_list()
    {
        $titcketearn=Earn::latest()->get();
        return view('admin.pages.totalearn.all',compact('titcketearn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counter=Counter::all();
        return view('admin.pages.totalearn.create',compact('counter'));
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
            'counter_id'=>'required',
        ]);
        if($Validate->fails()){
            return redirect()->back()->withErrors($Validate)->withinput();
        }
        $ticketEarn['counter_id']=$request->counter_id;
        $ticketEarn['total_ticket']=$request->total_ticket;
        $ticketEarn['per_ticket_price']=$request->per_ticket_price;

        $total_amount=$request->total_ticket * $request->per_ticket_price;
        $ticketEarn['total_amount']=$total_amount;
        $ticketEarn['shift']=$request->shift;
        $ticketEarn['date']=$request->date;

        $accessoriesEarn['counter_id']=$request->counter_id;
        $accessoriesEarn['total_amount']=$request->ass_total;
        $accessoriesEarn['shift']=$request->shift;
        $accessoriesEarn['date']=$request->date;

        DB::beginTransaction();
        try {
            $ticket_id = TicketEarn::create($ticketEarn);
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Ticket Earn Can Not Save.".$e->getMessage()]);
            Toastr::warning('Ticket Earn Can not save','warning');
            return back()->withInput();
        }
        $earn['ticket_id'] =$ticket_id->id;
       if ($request->ass_total) {
        try {
             $access_id =AccessoriesEarn::create($accessoriesEarn);
        } catch (\PDOException $e) {
            Toastr::warning('Access Earn Can not save','warning');
            return back()->withInput();
        }
         $earn['access_id']=$access_id->id;

       }
        $earn['counter_id']=$request->counter_id;
        $earn['total_earn']=$total_amount + $request->ass_total;

       try {
         $toearn=  Earn::create($earn); //ok
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Earn creation fail.".$e->getMessage()]);
            Toastr::warning('All Earn Can not save','warning');
            return back()->withInput();
        }

        Toastr::success('Earn create successful.','success');
        DB::commit();
        return redirect()->route('allearn.index');
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
        $earn=Earn::findorfail($id);
        if (!$earn){
            // Session::put(['message.error' => '']);
            Toastr::error('Member can\'t found','Error');
            return back();
        }else{
            return view('admin.pages.totalearn.edit',compact('earn','counter'));
        }

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
            'counter_id'=>'required',
        ]);
        if($Validate->fails()){
            return redirect()->back()->withErrors($Validate)->withinput();
        }

        $earnid= Earn::findOrfail($id);

        $ticketEarn['counter_id']=$request->counter_id;
        $ticketEarn['total_ticket']=$request->total_ticket;
        $ticketEarn['per_ticket_price']=$request->per_ticket_price;

        $total_amount=$request->total_ticket * $request->per_ticket_price;
        $ticketEarn['total_amount']=$total_amount;
        $ticketEarn['shift']=$request->shift;
        $ticketEarn['date']=$request->date ?? $request->old_date;

        $accessoriesEarn['counter_id']=$request->counter_id;
        $accessoriesEarn['total_amount']=$request->ass_total;
        $accessoriesEarn['shift']=$request->shift;
        $accessoriesEarn['date']=$request->date ?? $request->old_date;
        DB::beginTransaction();

        $ticketearnId=TicketEarn::where('id',$earnid->ticket_id)->first();

        if($ticketearnId){
        try {
            $ticketearnId->update($ticketEarn);
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Ticket Earn Can Not Save.".$e->getMessage()]);
            Toastr::warning('Ticket Earn Can not save','warning');
            return back()->withInput();
        }
    }

        $earn['ticket_id'] =$ticketearnId->id;
        $aceesoldId=AccessoriesEarn::where('id',$earnid->access_id)->first();

       if ($request->ass_total) {
        if($aceesoldId){
        try {
             $aceesoldId->update($accessoriesEarn);
        } catch (\PDOException $e) {
            Toastr::warning('Access Earn Can not save','warning');
            return back()->withInput();
        }
         $earn['access_id']=$aceesoldId->id;

       }
    }
        $earn['counter_id']=$request->counter_id;
        $earn['total_earn']=$total_amount + $request->ass_total;


        if($earnid){
       try {
         $earnid->update($earn); //ok
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Earn creation fail.".$e->getMessage()]);
            Toastr::warning('All Earn Can not save','warning');
            return back()->withInput();
        }
    }
        Toastr::success('Earn create successful.','success');
        DB::commit();
        return redirect()->route('allearn.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $earnid=Earn::findorfail($id);

        if($earnid){
            $oldticketid=TicketEarn::where('id',$earnid->ticket_id)->first();
            if($oldticketid)
            {
                $oldticketid->delete();
            }else{
                Toastr::warning('Ticket Earn  Not Delete.','warning');
            }
            $oldaccesid=AccessoriesEarn::where('id',$earnid->access_id)->first();
            if($oldaccesid){
                $oldaccesid->delete();
            }else{
                Toastr::warning('Accessories Earn  Not Delete.','warning');
            }

            $earnid->delete();
            Toastr::success('Delete.','success');
            return redirect()->back();
        }else{
            Toastr::warning(' Not Delete.','warning');
            return redirect()->back();
        }

    }
}
