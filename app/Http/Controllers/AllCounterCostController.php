<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Counter;
use App\Model\CounterCost;
use App\Model\CounterCostAdd;
use App\Model\CounterCostList;
use App\Model\CounterManInfo;
use App\Model\CounterManSalary;
use App\Model\HelperInfo;
use App\Model\HelperSalary;
use App\Model\CheckerInfo;
use App\Model\CheckerSalary;
use DB;
use Auth;
use Carbon\Carbon;
class AllCounterCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $currentDate= Carbon::now()->toDateString();
        $allbuscost=CounterCost::latest()
            ->whereDate('created_at',$currentDate)
            ->get();
        return view('admin.pages.all-cost.countercost.index',compact('allbuscost'));
    }

    public function allinfo()
    {
        $allbuscost=CounterCost::latest()
        ->get();
    return view('admin.pages.all-cost.countercost.all',compact('allbuscost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counter=Counter::all();
        $countercostlist=CounterCostList::all();
        $countemaninfo=CounterManInfo::all();
        $helperinfo=HelperInfo::all();
        $checkerinfo=CheckerInfo::all();
        return view('admin.pages.all-cost.countercost.create',compact('counter','countercostlist','countemaninfo','helperinfo','checkerinfo'));
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
        $countercost['counter_id']=$request->counter_id;
        $countercost['counter_cost_id']=$request->counter_cost_id;
        $countercost['taka']=$request->taka ?? 0;
        $countercost['date']=$request->counter_cost_date;



        $countermansalary['counter_id']=$request->counter_id;
        $countermansalary['counterman_id']=$request->counterman_id;
        $countermansalary['shift']=$request->co_shift;
        $countermansalary['salary_date']=$request->counterman_sa_date;
        $countermansalary['taka']=$request->countman_taka ??0;

        $helpersalary['counter_id']=$request->counter_id;
        $helpersalary['helper_id']=$request->helper_id;
        $helpersalary['shift']=$request->helper_shift;
        $helpersalary['salary_date']=$request->helper_salaray_date;
        $helpersalary['taka']=$request->helpar_taka ?? 0;

        $checkersalary['counter_id']=$request->counter_id;
        $checkersalary['checker_id']=$request->checker_id;
        $checkersalary['shift']=$request->checker_shift;
        $checkersalary['salary_date']=$request->checker_s_date;
        $checkersalary['taka']=$request->checker_s_taka ??0;

        $countercosttaka=$request->taka;
        $countermansalarytaka=$request->countman_taka;
        $helpersalarytaka=$request->helpar_taka;
        $checkersalarytaka=$request->checker_s_taka;
        $alltaka=$countercosttaka+$countermansalarytaka+$helpersalarytaka+$checkersalarytaka;

        DB::beginTransaction();
        try {
            $countercost_id = CounterCostAdd::create($countercost);
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Ticket Earn Can Not Save.".$e->getMessage()]);
            Toastr::warning('Counter  Cost Can not save','warning');
            return back()->withInput();
        }
        $allcountercost['counter_cost_add_id'] =$countercost_id->id;
       if ($request->countman_taka) {
        try {
             $countermansalary_id =CounterManSalary::create($countermansalary);
        } catch (\PDOException $e) {
            Toastr::warning('Counter Man Salary Can not save','warning');
            return back()->withInput();
        }
         $allcountercost['counterman_salary_id']=$countermansalary_id->id;

       }
       if ($request->checker_s_taka) {
        try {
             $checkersalary_id =CheckerSalary::create($checkersalary);
        } catch (\PDOException $e) {
            Toastr::warning('Checker Salary Can not save','warning');
            return back()->withInput();
        }
         $allcountercost['checker_salaries_id']=$checkersalary_id->id;
       }
       if ($request->helpar_taka) {
        try {
             $helpersalary_id =HelperSalary::create($helpersalary);
        } catch (\PDOException $e) {
            Toastr::warning('Helper Salary Can not save','warning');
            return back()->withInput();
        }
         $allcountercost['helper_salary_id']=$helpersalary_id->id;
       }

        $allcountercost['counter_id']=$request->counter_id;
        $allcountercost['total_cost']=$alltaka;

       try {
         $toearn=CounterCost::create($allcountercost); //ok
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Earn creation fail.".$e->getMessage()]);
            Toastr::warning('All Cost Can not save','warning');
            return back()->withInput();
        }

        Toastr::success('Cost create successful.','success');
        DB::commit();
        return redirect()->route('allcountercost.index');
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
        $countercostlist=CounterCostList::all();
        $countemaninfo=CounterManInfo::all();
        $helperinfo=HelperInfo::all();
        $checkerinfo=CheckerInfo::all();
        $allbuscost=CounterCost::findorfail($id);
        return view('admin.pages.all-cost.countercost.edit',compact('counter','countercostlist','countemaninfo','helperinfo','checkerinfo','allbuscost'));
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
        $countercost['counter_id']=$request->counter_id;
        $countercost['counter_cost_id']=$request->counter_cost_id;
        $countercost['taka']=$request->taka ?? 0;
        $countercost['date']=$request->counter_cost_date;



        $countermansalary['counter_id']=$request->counter_id;
        $countermansalary['counterman_id']=$request->counterman_id;
        $countermansalary['shift']=$request->co_shift;
        $countermansalary['salary_date']=$request->counterman_sa_date;
        $countermansalary['taka']=$request->countman_taka ??0;

        $helpersalary['counter_id']=$request->counter_id;
        $helpersalary['helper_id']=$request->helper_id;
        $helpersalary['shift']=$request->helper_shift;
        $helpersalary['salary_date']=$request->helper_salaray_date;
        $helpersalary['taka']=$request->helpar_taka ?? 0;

        $checkersalary['counter_id']=$request->counter_id;
        $checkersalary['checker_id']=$request->checker_id;
        $checkersalary['shift']=$request->checker_shift;
        $checkersalary['salary_date']=$request->checker_s_date;
        $checkersalary['taka']=$request->checker_s_taka ??0;

        $countercosttaka=$request->taka;
        $countermansalarytaka=$request->countman_taka;
        $helpersalarytaka=$request->helpar_taka;
        $checkersalarytaka=$request->checker_s_taka;
        $alltaka=$countercosttaka+$countermansalarytaka+$helpersalarytaka+$checkersalarytaka;

        $allbuscost=CounterCost::findorfail($id);

        $countercost_id=CounterCostAdd::where('id',$allbuscost->counter_cost_add_id)->first();
        DB::beginTransaction();
        try {
            $countercost_id ->update($countercost);
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Ticket Earn Can Not Save.".$e->getMessage()]);
            Toastr::warning('Counter  Cost Can not save','warning');
            return back()->withInput();
        }
        $allcountercost['counter_cost_add_id'] =$countercost_id->id;
        $countermansalary_id=CounterManSalary::where('id',$allbuscost->counterman_salary_id)->first();
       if ($request->countman_taka) {
        try {
             $countermansalary_id ->update($countermansalary);
        } catch (\PDOException $e) {
            Toastr::warning('Counter Man Salary Can not save','warning');
            return back()->withInput();
        }
         $allcountercost['counterman_salary_id']=$countermansalary_id->id;

       }
       $checkersalary_id=CheckerSalary::where('id',$allbuscost->checker_salaries_id)->first();
       if ($request->checker_s_taka) {
        try {
             $checkersalary_id ->update($checkersalary);
        } catch (\PDOException $e) {
            Toastr::warning('Checker Salary Can not save','warning');
            return back()->withInput();
        }
         $allcountercost['checker_salaries_id']=$checkersalary_id->id;
       }
       $helpersalary_id=HelperSalary::where('id',$allbuscost->helper_salary_id)->first();

       if ($request->helpar_taka) {
        try {
             $helpersalary_id->update($helpersalary);
        } catch (\PDOException $e) {
            Toastr::warning('Helper Salary Can not save','warning');
            return back()->withInput();
        }
         $allcountercost['helper_salary_id']=$helpersalary_id->id;
       }

        $allcountercost['counter_id']=$request->counter_id;
        $allcountercost['total_cost']=$alltaka;

       try {
         $allbuscost->update($allcountercost); //ok
        } catch (\PDOException $e) {
            // Session::put(['message.error' => "Earn creation fail.".$e->getMessage()]);
            Toastr::warning('All Cost Can not save','warning');
            return back()->withInput();
        }

        Toastr::success('Counter CostUpdate Successfully','success');
        DB::commit();
        return redirect()->route('allcountercost.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $allbuscost=CounterCost::findorfail($id);

        if($allbuscost){
            $countercost_id=CounterCostAdd::where('id',$allbuscost->counter_cost_add_id)->first();
            if($countercost_id)
            {
                $countercost_id->delete();
            }else{
                Toastr::warning('CounterCost   Not Delete.','warning');
            }
            $countermansalary_id=CounterManSalary::where('id',$allbuscost->counterman_salary_id)->first();
            if($countermansalary_id){
                $countermansalary_id->delete();
            }else{
                Toastr::warning('Counter Man salary   Not Delete.','warning');
            }
            $checkersalary_id=CheckerSalary::where('id',$allbuscost->checker_salaries_id)->first();
            if($checkersalary_id){
                $checkersalary_id->delete();
            }else{
                Toastr::warning('Checker Salary   Not Delete.','warning');
            }
            $helpersalary_id=HelperSalary::where('id',$allbuscost->helper_salary_id)->first();
            if($helpersalary_id){
                $helpersalary_id->delete();
            }else{
                Toastr::warning('Helper Salary   Not Delete.','warning');
            }

            $allbuscost->delete();
            Toastr::success('Delete.','success');
            return redirect()->back();
        }else{
            Toastr::warning(' Not Delete.','warning');
            return redirect()->back();
        }
    }
}
