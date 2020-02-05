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

class VarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = collect(\DB::select("select * from vars"));
        $data = json_decode( json_encode($result), true);
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        $labels = Labels::with('labels_menus')->get();
        return view('admin.vars',compact('service_module','data','labels'));
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
        $validatedData = $request->validate([
           'var_title' => 'required|max:255',
           'var_name' =>  'required|max:255',
       ]);

        $var = new vars();
        $var->var_title = $request->input('var_title');
        $var->var_name = $request->input('var_name');
        $var->var_type = $request->input('var_type');
        $var->var_desc = "";
        $var->save();
        return redirect('/vars');
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
        $vars = vars::Where('id',$id)->get();
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        $labels = Labels::with('labels_menus')->get();
        return view('admin.edit-vars',compact('service_module','vars','labels'));
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
        

        $var = new vars();
        $var->var_title = $request->input('var_title');
        $var->var_name = $request->input('var_name');
        $var->var_type = $request->input('var_type');
        $var->var_desc = "";
         $res = vars::where('id',$id)->update(
        [ 'var_title'=>$var->var_title, 
        'var_type'=>$var->var_type
    ]);
        return redirect('/vars');
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
