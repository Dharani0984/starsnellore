<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\SubMenu;
use App\Myaccount;
use App\Requests;
use Session;
use App\vars;
use App\HomeGallery;
use App\api\Modules;
use App\api\ServiceModel;
use App\api\ServicemeusModel;
use App\api\ServicesubmeusModel;
use App\api\Labels;
use App\api\LabelsMenu;
use App\User;

class MyaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $result = collect(\DB::select("select * from myaccount"))->first();
       $data = json_decode( json_encode($result), true);
       Session::put('data',$data);
       $labels = Labels::with('labels_menus')->get();
       $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
       return view('admin.myaccount',compact('service_module','labels'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labels = Labels::with('labels_menus')->get();
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        return view('admin.profile',compact('service_module','labels','profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $myaccount = new User();
       $myaccount->name = $request->input('name');
       if($request->hasfile('photo')){
        $myaccount->photo = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($myaccount->photo, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $fileNameToStore = $filename . '.' . $extension;
        $path = $request->file('photo')->storeAs('uploads', $fileNameToStore);
    } else {
        $fileNameToStore = 'noimage.jpg';
    }
    $myaccount->dob = date('Y-m-d',strtotime($request->input('dob')));
    $myaccount->fname = $request->input('fname');
    $myaccount->mname = $request->input('mname');
    $myaccount->mname = $request->input('mname');
    $myaccount->phone = $request->input('phone');
    $myaccount->email = $request->input('email');
    $myaccount->address = $request->input('address');

    $res = User::where('name',$myaccount->name)->update(['name'=>$myaccount->name, 
        'photo'=>$myaccount->photo,
        'dob'=>$myaccount->dob,
        'fname'=>$myaccount->fname,
        'mname'=>$myaccount->mname,
        'photo'=>$myaccount->photo,
        'phone'=>$myaccount->phone,
        'email'=>$myaccount->email,
        'address'=>$myaccount->address]
    );
    //$res = $myaccount->update();
    //$menu = Menu::all()->load('submenu');
    return redirect('/myaccount');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
