<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Model\Owner;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.owner.index');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owner=[];
        $owner['owner']=owner::all();
         return view('admin.pages.owner.all-information',$owner);
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
         'phone' => 'required|unique:owners',
         'email' => 'unique:owners',
         'address'=>'required|max:200',
         'image' => 'image|mimes:jpeg,png,jpg|max:100048',
         'email' => 'unique:owners',
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
           if (!file_exists('owners'))
           {
               mkdir('owners', 0777 , true);
           }
           $image->move('owners',$imagename);
       }else {
           $imagename = 'dafault.png';
       }
     $owner =new Owner();
     $owner->name=$request->name;
     $owner->phone=$request->phone;
     $owner->email=$request->email;
     $owner->bank_number=$request->bank_number;
     $owner->national_id=$request->national_id;
     $owner->address=$request->address;
     $owner->image=$imagename;
     $owner->save();
     Toastr::success('মালিকের ইনফরমেশন সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
     return redirect()->route('owner.create');
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
         $owners=Owner::findOrfail($id);
        return view('admin.pages.owner.edite',compact('owners'));
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
         'address'=>'required|max:200',
         'image' => 'mimes:jpeg,png,jpg,gif',

     ]);

    if($validate->fails()){
        return redirect()->back()->withErrors($validate)->withInput();
     }


     $image = $request->file('image');
     $oldimage=$request->old_image;
     $slug = str_slug($request->name);
     if (isset($image))
     {
         $currentDate = Carbon::now()->toDateString();
         $imagename =$slug.'-'.$currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
         if (!file_exists('owners'))
         {
             mkdir('owners', 0777 , true);
         }
         $image->move('owners',$imagename);
     }else {
         $imagename =$oldimage;
     }
     $owner =Owner::findOrfail($id);
     $owner->name=$request->name;
     $owner->phone=$request->phone;
     $owner->email=$request->email;
     $owner->bank_number=$request->bank_number;
     $owner->national_id=$request->national_id;
     $owner->address=$request->address;
     $owner->image=$imagename;
     $owner->save();
     Toastr::success('মালিকের ইনফরমেশন সফলভাবে পরিবর্তন   করা হয়েছে!!','Success',["positionClass" => "toast-bottom-right"]);
     return redirect()->route('owner.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $owner = Owner::find($id);
        if (file_exists('owners/'.$owner->image)) {
            unlink('owners/'.$owner->image);
        }
        $owner->delete();
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
       return back();
    }
}
