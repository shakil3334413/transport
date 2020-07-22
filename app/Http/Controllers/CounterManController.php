<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Model\CounterManInfo;
use Carbon\Carbon;
class CounterManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.counterman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countermans=[];
        $countermans['countermans']=CounterManInfo::all();
        return view('admin.pages.counterman.info',$countermans);
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
            if (!file_exists('countermans'))
            {
                mkdir('countermans', 0777 , true);
            }
            $image->move('countermans',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $counterman = new CounterManInfo();
        $counterman->name=$request->name;
        $counterman->phone=$request->phone;
        $counterman->national_id=$request->national_id;
        $counterman->address=$request->address;
        $counterman->image=$imagename;
        $counterman->save();
        Toastr::success('কাউন্টার ম্যান ইনফরমেশন সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('counterman.create');
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
        $counterman=CounterManInfo::find($id);
        return view('admin.pages.counterman.edit',compact('counterman'));
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
        $counterman =CounterManInfo::find($id);
        $counterman->name=$request->name;
        $counterman->phone=$request->phone;
        $counterman->national_id=$request->national_id;
        $counterman->address=$request->address;
        $counterman->image=$imagename;
        $counterman->save();
        Toastr::success('আপনার ইনফরমেশন সফলভাবে পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('counterman.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counterman=CounterManInfo::find($id)->delete();
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
