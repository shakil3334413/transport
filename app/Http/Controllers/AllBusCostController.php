<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use auth;
use App\Model\Bus;
use App\Model\CostAdd;
use App\Model\CostList;
use App\Model\GpCostAdd;
use App\Model\DriverSalary;
use App\Model\DriverInfo;
use App\Model\AllBusCost;
use Carbon\Carbon;
class AllBusCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDate= Carbon::now()->toDateString();
        $allbuscost=AllBusCost::latest()
            ->whereDate('created_at',$currentDate)
            ->get();
        return view('admin.pages.all-cost.buscost.index',compact('allbuscost'));
    }

    public function allinfo()
    {
        $allbuscost=AllBusCost::latest()->get();
        return view('admin.pages.all-cost.buscost.all',compact('allbuscost'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bus=Bus::all();
        $costlist=CostList::all();
        $driverinfo=DriverInfo::all();
        return view('admin.pages.all-cost.buscost.create',compact('bus','costlist','driverinfo'));
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
            'bus_id'=>'required',
        ]);
        if($Validate->fails()){
            return redirect()->back()->withErrors($Validate)->withinput();
        }
        $date = Carbon::now()->format('y-m-d');
        $buscost['bus_id']=$request->bus_id;
        $buscost['cost_id']=$request->cost_id;
        $buscost['taka']=$request->taka ?? 0;
        $bustaka=$request->taka ?? 0;
        $buscost['date']=$request->date?? $date;


        $gpcost['bus_id']=$request->bus_id;
        $gpcost['taka']=$request->gp_taka ?? 0;
        $gpcost['date']=$request->gp_date ?? $date;
        $gptaka=$request->gp_taka ?? 0;

        $driversalary['bus_id']=$request->bus_id;
        $driversalary['driver_id']=$request->driver_id;
        $driversalary['salary_date']=$request->salary_date ?? $date;
        $driversalary['taka']=$request->driver_taka ?? 0;

        $driversalarytaka=$request->driver_taka ?? 0;

        $totalbuscost=$driversalarytaka + $gptaka + $bustaka;

        DB::beginTransaction();
        try {
            $buscost_id = CostAdd::create($buscost);
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Ticket Earn Can Not Save.".$e->getMessage()]);
            Toastr::warning('Bus  Cost Can not save','warning');
            return back()->withInput();
        }
        $allbuscost['cost_add_id'] =$buscost_id->id;
       if ($request->gp_taka) {
        try {
             $gp_id =GpCostAdd::create($gpcost);
        } catch (\PDOException $e) {
            Toastr::warning('Gp Cost Can not save','warning');
            return back()->withInput();
        }
         $allbuscost['gp_cost_add_id']=$gp_id->id;

       }
       if ($request->driver_taka) {
        try {
             $driver_salary_id =DriverSalary::create($driversalary);
        } catch (\PDOException $e) {
            Toastr::warning('Driver Salary Can not save','warning');
            return back()->withInput();
        }
         $allbuscost['driver_salarie_id']=$driver_salary_id->id;

       }
        $allbuscost['bus_id']=$request->bus_id;
        $allbuscost['total_cost']=$totalbuscost;

       try {
         $toearn=  AllBusCost::create($allbuscost); //ok
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Earn creation fail.".$e->getMessage()]);
            Toastr::warning('All Cost Can not save','warning');
            return back()->withInput();
        }

        Toastr::success('Cost create successful.','success');
        DB::commit();
        return redirect()->route('allbuscost.index');
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
        $bus=Bus::all();
        $costlist=CostList::all();
        $driverinfo=DriverInfo::all();
        $allbuscost=AllBusCost::findorfail($id);
        return view('admin.pages.all-cost.buscost.edit',compact('bus','costlist','driverinfo','allbuscost'));

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
            'bus_id'=>'required',
        ]);
        if($Validate->fails()){
            return redirect()->back()->withErrors($Validate)->withinput();
        }

        $allcostid=AllBusCost::findorfail($id);

        $date = Carbon::now()->format('y-m-d');
        $buscost['bus_id']=$request->bus_id;
        $buscost['cost_id']=$request->cost_id;
        $buscost['taka']=$request->taka ?? 0;
        $bustaka=$request->taka ?? 0;
        $buscost['date']=$request->date?? $date;


        $gpcost['bus_id']=$request->bus_id;
        $gpcost['taka']=$request->gp_taka ?? 0;
        $gpcost['date']=$request->gp_date ?? $date;
        $gptaka=$request->gp_taka ?? 0;

        $driversalary['bus_id']=$request->bus_id;
        $driversalary['driver_id']=$request->driver_id;
        $driversalary['salary_date']=$request->salary_date ?? $date;
        $driversalary['taka']=$request->driver_taka ?? 0;

        $driversalarytaka=$request->driver_taka ?? 0;

        $totalbuscost=$driversalarytaka + $gptaka + $bustaka;

        DB::beginTransaction();

        $buscost_id=CostAdd::where('id',$allcostid->cost_add_id)->first();

        if($buscost_id){
        try {
            $buscost_id->update($buscost);
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Ticket Earn Can Not Save.".$e->getMessage()]);
            Toastr::warning('Bus  Cost Can not Update','warning');
            return back()->withInput();
        }
    }
        $allbuscost['cost_add_id'] =$buscost_id->id;

        $gp_id=GpCostAdd::where('id',$allcostid->gp_cost_add_id)->first();
       if ($request->gp_taka) {
           if($gp_id){
        try {
             $gp_id->update($gpcost);
        } catch (\PDOException $e) {
            Toastr::warning('Gp Cost Can not Update','warning');
            return back()->withInput();
        }
         $allbuscost['gp_cost_add_id']=$gp_id->id;
    }
       }


       $driver_salary_id=DriverSalary::where('id',$allcostid->driver_salarie_id)->first();
       if ($request->driver_taka) {
           if($driver_salary_id){
        try {
             $driver_salary_id =DriverSalary::create($driversalary);
        } catch (\PDOException $e) {
            Toastr::warning('Driver Salary Can not save','warning');
            return back()->withInput();
        }
         $allbuscost['driver_salarie_id']=$driver_salary_id->id;
    }
       }
        $allbuscost['bus_id']=$request->bus_id;
        $allbuscost['total_cost']=$totalbuscost;

       try {
         $allcostid->update($allbuscost); //ok
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Earn creation fail.".$e->getMessage()]);
            Toastr::warning('All Cost Can not Update','warning');
            return back()->withInput();
        }

        Toastr::success('Cost Update successful.','success');
        DB::commit();
        return redirect()->route('allbuscost.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $earnid=AllBusCost::findorfail($id);

        if($earnid){
            $oldticketid=GpCostAdd::where('id',$earnid->gp_cost_add_id)->first();
            if($oldticketid)
            {
                $oldticketid->delete();
            }else{
                Toastr::warning('GPCOST   Not Delete.','warning');
            }
            $oldaccesid=DriverSalary::where('id',$earnid->driver_salarie_id)->first();
            if($oldaccesid){
                $oldaccesid->delete();
            }else{
                Toastr::warning('Driver Salrary   Not Delete.','warning');
            }
            $costid=CostAdd::where('id',$earnid->cost_add_id)->first();
            if($costid){
                $costid->delete();
            }else{
                Toastr::warning('Cost Add   Not Delete.','warning');
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
