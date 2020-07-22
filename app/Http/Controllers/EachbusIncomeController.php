<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Model\EachBusIncome;
use App\Model\Bus;
use Illuminate\Support\Carbon;
class EachbusIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carnumber=Bus::all();
        return view('admin.pages.eachbusincome.index',compact('carnumber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentDate= Carbon::now()->toDateString();
        $eachbusincome=EachbusIncome::latest()
            ->whereDate('created_at',$currentDate)
            ->get();
        $carnumber=Bus::all();
        return view('admin.pages.eachbusincome.todayeachbus',compact('eachbusincome','carnumber'));
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
            'bus_id' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $date = Carbon::now()->format('y-m-d');
        $eachBusIncome=new EachBusIncome;
        $eachBusIncome->date=$request->date ?? $date;
        $eachBusIncome->bus_id=$request->bus_id;
        $eachBusIncome->all_trip=$request->all_trip;
        $eachBusIncome->all_bus_earn=$request->all_bus_earn ?? 0;
        $eachBusIncome->trip_rate=$request->trip_rate;
        $eachBusIncome->earn=$request->earn ?? 0;
        $eachBusIncome->oil_cost=$request->oil_cost ?? 0;
        $eachBusIncome->staff_cost=$request->staff_cost ?? 0;
        $eachBusIncome->neat_earn=$request->neat_earn ?? 0;
        $eachBusIncome->trip_number=$request->trip_number ?? 0;
        $urtoln=$request->uttolon_taka ?? 0;
        $joripana=$request->joripana ?? 0;
        $eachBusIncome->uttolon_taka=$urtoln;
        $eachBusIncome->joripana=$joripana;

        $ogrim=EachBusIncome::select('ogrim_taka')->where('bus_id',$eachBusIncome->bus_id)->orderBy('id','desc')->first();
        if(isset($ogrim)){
        $eachBusIncome->ogrim_taka=$eachBusIncome->neat_earn+$ogrim->ogrim_taka;
        }else{
            $eachBusIncome->ogrim_taka=0;
        }
        $eachBusIncome->total_earn=$eachBusIncome->ogrim_taka+$eachBusIncome->neat_earn;


        $obosisto_taka=EachBusIncome::select('obosisto_taka')->where('bus_id',$eachBusIncome->bus_id)->orderBy('id','desc')->first();
        $eachBusIncome->obosisto_taka= $eachBusIncome->total_earn-($urtoln+$joripana);
        $eachBusIncome->save();
        Toastr::success('প্রতিটি গাডির আয় তালিকা সফলভাবে যুক্ত করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('eachbusincome.create');

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
        $eachbusincome=EachbusIncome::find($id);
        $carnumber=Bus::all();
        return view('admin.pages.eachbusincome.edit',compact('eachbusincome','carnumber'));
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
            'bus_id' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $date =$request->olddate;
        $eachBusIncome=EachBusIncome::findorfail($id);
        $eachBusIncome->date=$request->date ?? $date;
        $eachBusIncome->bus_id=$request->bus_id;
        $eachBusIncome->all_trip=$request->all_trip;
        $eachBusIncome->all_bus_earn=$request->all_bus_earn ?? 0;
        $eachBusIncome->trip_rate=$request->trip_rate;
        $eachBusIncome->earn=$request->earn ?? 0;
        $eachBusIncome->oil_cost=$request->oil_cost ?? 0;
        $eachBusIncome->staff_cost=$request->staff_cost ?? 0;
        $eachBusIncome->neat_earn=$request->neat_earn ?? 0;
        $eachBusIncome->trip_number=$request->trip_number ?? 0;
        $urtoln=$request->uttolon_taka ?? 0;
        $joripana=$request->joripana ?? 0;
        $eachBusIncome->uttolon_taka=$urtoln;
        $eachBusIncome->joripana=$joripana;

        $ogrim=EachBusIncome::select('ogrim_taka')->where('bus_id',$eachBusIncome->bus_id)->orderBy('id','desc')->first();
        if(isset($ogrim)){
        $eachBusIncome->ogrim_taka=$eachBusIncome->neat_earn+$ogrim->ogrim_taka;
        }else{
            $eachBusIncome->ogrim_taka=0;
        }
        $eachBusIncome->total_earn=$eachBusIncome->ogrim_taka+$eachBusIncome->neat_earn;


        $obosisto_taka=EachBusIncome::select('obosisto_taka')->where('bus_id',$eachBusIncome->bus_id)->orderBy('id','desc')->first();
        $eachBusIncome->obosisto_taka= $eachBusIncome->total_earn-($urtoln+$joripana);
        $eachBusIncome->save();
        Toastr::success('প্রতিটি গাডির আয় তালিকা সফলভাবে যুক্ত করা হয়েছে !','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('eachbusincome.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EachbusIncome::destroy($id);
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }


    // All eachbusincome

    public function Weekeach()
    {
        $start = Carbon::setWeekStartsAt(Carbon::SATURDAY);
        $end = Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $eachbusincome=EachbusIncome::whereBetween('date', [Carbon::now()->startOfWeek($start)->format('Y-m-d H:i'),Carbon::now()->endOfWeek($end)->format('Y-m-d H:i')])->paginate(20);
        return view('admin.pages.eachbusincome.weekeachbus',compact('eachbusincome'));
    }
    public function Montheach()
    {
        $eachbusincome=EachbusIncome::latest()
          ->whereYear('date', Carbon::now()->year)
          ->whereMonth('date', Carbon::now()->month)
          ->paginate(20);
        return view('admin.pages.eachbusincome.montheachbus',compact('eachbusincome'));
    }
    public function Yeareach()
    {
        $eachbusincome=EachbusIncome::latest()
          ->whereYear('date', Carbon::now()->year)
          ->paginate(30);
        return view('admin.pages.eachbusincome.yeareachbus',compact('eachbusincome'));
    }
    public function Totaleach()
    {
        $eachbusincome=EachbusIncome::latest()->paginate(40);
        return view('admin.pages.eachbusincome.totaleachbus',compact('eachbusincome'));
    }


}
