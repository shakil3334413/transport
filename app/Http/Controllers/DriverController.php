<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Model\DriverInfo;
use Carbon\Carbon;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.driver.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers=[];
        $drivers['drivers']=DriverInfo::all();
        return view('admin.pages.driver.driver-info',$drivers);
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
         'name' => 'required',
         'phone' => 'required',
         'driving_liceing' => 'required',
         'address' => 'required',
         'image' => 'image|mimes:jpeg,png,jpg|max:100048',
         ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =$slug.'-'.$currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('drivers'))
            {
                mkdir('drivers', 0777 , true);
            }
            $image->move('drivers',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $driver = new DriverInfo();
        $driver->name=$request->name;
        $driver->phone=$request->phone;
        $driver->driving_liceing=$request->driving_liceing;
        $driver->national_id=$request->national_id;
        $driver->address=$request->address;
        $driver->image=$imagename;
        $driver->save();
        Toastr::success('ড্রাইভার ইনফরমেশন সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('driver.create');
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
        $driver= DriverInfo::find($id);
        return view('admin.pages.driver.edit',compact('driver'));
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
            'name' => 'required',
            'phone' => 'required',
            'driving_liceing' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
           if($validate->fails()){
               return redirect()->back()->withErrors($validate)->withInput();
           }
           $oldimage=$request->old_image;
           $image = $request->file('image');
            $slug = str_slug($request->name);
            if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename =$slug.'-'.$currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
                if (!file_exists('drivers'))
                {
                    mkdir('drivers', 0777 , true);
                }
                $image->move('drivers',$imagename);
            }else {
                $imagename =$oldimage;
            }
        $driver = DriverInfo::find($id);
        $driver->name=$request->name;
        $driver->phone=$request->phone;
        $driver->driving_liceing=$request->driving_liceing;
        $driver->national_id=$request->national_id;
        $driver->address=$request->address;
        $driver->image=$imagename;
        $driver->save();
        Toastr::success('আপনার ইনফরমেশন সফলভাবে পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('driver.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver= DriverInfo::find($id)->delete();
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
