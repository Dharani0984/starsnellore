<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\api\Modules;
use App\api\ServiceModel;
use App\api\ServicemeusModel;
use App\api\ServicesubmeusModel;
use Validator;

class MenuController extends Controller
{
        public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $result = ServicemeusModel::all();
    return response()->json(['success' => $result], $this->successStatus);
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
        $post = Input::All();
      $validatedData = $request->validate([
        'menu_title' => 'required',
        'menu_name' => 'required',
        'menu_description' => 'required',
        'menu_url' => 'required',
        'menu_slug' => 'required',
      ]);
      $service_menu = new ServicemeusModel();
      $service_menu->service_id = $request->input('service_id');
      $service_menu->service_name = $request->input('service_name');
      $service_menu->menu_title = $request->input('menu_title');
      $service_menu->menu_name = $request->input('menu_name');
      $service_menu->menu_description = $request->input('menu_description');
      $service_menu->menu_url = $request->input('menu_url');
      if($request->hasfile('menu_img')){
        $file = $request->file('menu_img')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = $request->file('menu_img')->getClientOriginalExtension();
        $fileNameToStore = $filename .'.'. $extension;
        $path = $request->file('menu_img')->storeAs('uploads', $fileNameToStore);
      } else {
        $fileNameToStore = 'noimage.jpg';
      }
      $service_menu->menu_img = $fileNameToStore;
      $service_menu->menu_slug = $request->input('menu_slug');
      $service_menu->save();
      $last_insert_id = $service_menu->service_id;
    return response()->json(['status'=>'success'], $this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id != ''){
     $service_menus = collect(\DB::select("select * from service_menus WHERE menu_id ='". $id."'"));
   }
    return response()->json(['menus' => $service_menus], $this->successStatus);
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
        $post = Input::All();
      $validatedData = $request->validate([
        'menu_title' => 'required',
        'menu_name' => 'required',
        'menu_description' => 'required',
        'menu_url' => 'required',
        'menu_slug' => 'required',
      ]);
      $service_menu = new ServicemeusModel();
      $service_menu->service_id = $request->input('service_id');
      $service_menu->menu_title = $request->input('menu_title');
      $service_menu->menu_name = $request->input('menu_name');
      $service_menu->menu_description = $request->input('menu_description');
      $service_menu->menu_url = $request->input('menu_url');
      if($request->hasfile('menu_img')){
        $file = $request->file('menu_img')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = $request->file('menu_img')->getClientOriginalExtension();
        $fileNameToStore = $filename .'.'. $extension;
        $path = $request->file('menu_img')->storeAs('uploads', $fileNameToStore);
      } else{
        $fileNameToStore = $service_menu->menu_img;
      }
      $service_menu->menu_img = $fileNameToStore;
      $service_menu->menu_slug = $request->input('menu_slug');
      $res = ServicemeusModel::where('id',$id)->update(
        [ 'menu_title'=>$service_menu->menu_title, 
        'menu_name'=>$service_menu->menu_name,
        'menu_description'=>$service_menu->menu_description,
        'menu_url'=>$service_menu->menu_url,
        'menu_img'=>$fileNameToStore,
        'menu_slug'=>$service_menu->menu_slug
      ]);
      $last_insert_id = $service_menu->service_id;
       return response()->json(['status'=>'updated'], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service_menu = new ServicemeusModel();
      $service_menu = ServicemeusModel::find($id);
      $service_menu->delete();
       return response()->json(['status'=>'deleted'], $this->successStatus);
    }
}
