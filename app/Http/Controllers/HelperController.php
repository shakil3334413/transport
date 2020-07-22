<?php
use Brian2694\Toastr\Facades\Toastr;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Model\HelperInfo;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
class HelperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.helper.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $helpers=[];
        $helpers['helpers']=HelperInfo::all();
        return view('admin.pages.helper.helper-info',$helpers);
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
            if (!file_exists('helpers'))
            {
                mkdir('helpers', 0777 , true);
            }
            $image->move('helpers',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $helper= new HelperInfo();
        $helper->name=$request->name;
        $helper->phone=$request->phone;
        $helper->national_id=$request->national_id;
        $helper->address=$request->address;
        $helper->image=$imagename;
        $helper->save();
        Toastr::success('হেল্পার ইনফরমেশন সফলভাবে যুক্ত করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('helper.create');
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
        $helper= HelperInfo::find($id);
        return view('admin.pages.helper.edit',compact('helper'));
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
            if (!file_exists('helpers'))
            {
                mkdir('helpers', 0777 , true);
            }
            $image->move('helpers',$imagename);
        }else {
            $imagename =$oldimage;
        }
        $helper= HelperInfo::find($id);
        $helper->name=$request->name;
        $helper->phone=$request->phone;
        $helper->national_id=$request->national_id;
        $helper->address=$request->address;
        $helper->image=$imagename;
        $helper->save();
        Toastr::success('আপনার ইনফরমেশন সফলভাবে পরিবর্তন করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return redirect()->route('helper.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $helper= HelperInfo::find($id)->delete();
        Toastr::success('ইনফর্মেশনটি সফলভাবে ডিলিট  করা হয়েছে!','Success',["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
