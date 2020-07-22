<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Model\CheckerInfo;
use Carbon\Carbon;
class CheackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.checker.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkers=[];
        $checkers['checkers']= CheckerInfo::all();
        return view('admin.pages.checker.info',$checkers);
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
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10048',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =$slug.'-'.$currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('checkers'))
            {
                mkdir('checkers', 0777 , true);
            }
            $image->move('checkers',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $checker= new CheckerInfo();
        $checker->name=$request->name;
        $checker->phone=$request->phone;
        $checker->national_id=$request->national_id;
        $checker->address=$request->address;
        $checker->image=$imagename;
        $checker->save();
        Toastr::success('চেকারের ইনফরমেশন সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('checker.create');
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
        $checker= CheckerInfo::find($id);
        return view('admin.pages.checker.edit',compact('checker'));
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
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $image = $request->file('image');
        $oldimage=$request->old_image;
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =$slug.'-'.$currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('checkers'))
            {
                mkdir('checkers', 0777 , true);
            }
            $image->move('checkers',$imagename);
        }else {
            $imagename =$oldimage;
        }
        $checker= CheckerInfo::find($id);
        $checker->name=$request->name;
        $checker->phone=$request->phone;
        $checker->national_id=$request->national_id;
        $checker->address=$request->address;
        $checker->image=$imagename;
        $checker->save();
        Toastr::success('আপনার ইনফরমেশন সফলভাবে পরিবর্তন করা হয়েছে!!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('checker.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checker= CheckerInfo::find($id)->delete();
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
