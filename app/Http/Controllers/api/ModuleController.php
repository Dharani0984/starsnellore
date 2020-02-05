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

class ModuleController extends Controller
{

    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = modules::all();
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
       $modules = new Modules();

       $validator = Validator::make($request->all(), [ 
          'modules_title' => 'required|unique:modules|max:255',
          'modules_name' => 'required|unique:modules|max:255',
          'modules_description' => 'required|max:255',
          'modules_url' => 'required|unique:modules',
          'modules_slug' => 'required'
      ]);   

       if ($validator->fails()) {          
         return response()->json(['error'=>$validator->errors()], 401);
     }

     $modules->modules_title = $request->input('modules_title');
     $modules->modules_name = $request->input('modules_name');
     $modules->modules_description = $request->input('modules_description');
     $modules->modules_url = $request->input('modules_url');
     if($request->hasfile('modules_img')){
         $file = $request->file('modules_img')->getClientOriginalName();
         $filename = pathinfo($file, PATHINFO_FILENAME);
         $extension = $request->file('modules_img')->getClientOriginalExtension();
         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
         $path = $request->file('modules_img')->storeAs('uploads', $fileNameToStore);
     } else {
         $fileNameToStore = 'noimage.jpg';
     }
     $modules->modules_img = $fileNameToStore;
     $modules->modules_slug = $request->input('modules_slug');
     //print_r($modules);
     $modules->save();
     //$modules = modules::all()->load('modules')->load('services');
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
        $data = ServiceModel::where('id',$id)->with('servicemeus.serviceSubmeus')->first();
        return response()->json(['services' => $data], $this->successStatus);
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
      $Modules = new Modules();
      $Modules->modules_title = $request->input('modules_title');
      $Modules->modules_name = $request->input('modules_name');
      $Modules->modules_description = $request->input('modules_description');
      $Modules->modules_url = $request->input('modules_url');
      if($request->hasfile('modules_img')){
        $file = $request->file('modules_img')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = $request->file('modules_img')->getClientOriginalExtension();
        $fileNameToStore = $filename .'.'. $extension;
        $path = $request->file('modules_img')->storeAs('uploads', $fileNameToStore);
    } else {
        $fileNameToStore = 'noimage.jpg';
    }
    $Modules->modules_img = $fileNameToStore;
    $Modules->modules_slug = $request->input('modules_slug');
    $res = Modules::where('id',$id)->update(
        [ 'modules_title'=>$Modules->modules_title, 
        'modules_name'=>$Modules->modules_name,
        'modules_description'=>$Modules->modules_description,
        'modules_url'=>$Modules->modules_url,
        'modules_img'=>$fileNameToStore,
        'modules_slug'=>$Modules->modules_slug
    ]);
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
        $Modules = new Modules();
        $Modules = Modules::find($id);
        $Modules->delete();
        return response()->json(['status'=>'deleted'], $this->successStatus);
    }

    public function view_services_details(){
     $modules = Modules::with('services.servicemeus.serviceSubmeus')->get();
     return response()->json(['modules' => $modules], $this->successStatus);
 }
 public function view_spec_module_data($id){
    $data = ServiceModel::where('id',$id)->with('servicemeus.serviceSubmeus')->first();
    return response()->json(['modules' => $data], $this->successStatus);
  } 

   public function view_service_data(){
    $data = ServiceModel::with('servicemeus.serviceSubmeus')->get();
    return response()->json(['modules' => $data], $this->successStatus);
  } 
}
