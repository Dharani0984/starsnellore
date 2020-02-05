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

class Websitesettings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $var = new vars();
     $var->var_type = $request->input('var_type');
     $var->var_desc = $request->input('var_desc');
     $res = vars::where('id',$var->var_type)->update(['var_desc'=>$var->var_desc]);
     return redirect('/websitesettings/'.$var->var_type);
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id ='')
    {
     $desc = [];
     if($id != ''){
       $result = collect(\DB::select("select * from vars WHERE id ='". $id."'"))->first();
       $desc = json_decode(json_encode($result), true);
   }else{
      $desc = array('var_desc'=>'');
  }
  $result = collect(\DB::select("select * from vars"));
  $data = json_decode( json_encode($result), true);

  $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
  $labels = Labels::with('labels_menus')->get();
  return view('admin.websitesettings',compact('service_module' , 'data', 'desc','labels'));
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
    public function update(Request $request, $id)
    {
        //
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
