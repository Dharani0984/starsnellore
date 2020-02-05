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

class ServiceController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ServiceModel::all();
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
        $services = new ServiceModel();

        $validator = Validator::make($request->all(), [ 
          'module_id' => 'required|unique:services|max:255',
          'module_name' => 'required|unique:services|max:255',
          'service_title' => 'required|unique:services|max:255',
          'service_name' => 'required|unique:services|max:255',
          'service_description' => 'required|max:255',
          'service_url' => 'required|unique:services',
          'service_slug' => 'required'
      ]);   

        if ($validator->fails()) {          
         return response()->json(['error'=>$validator->errors()], 401);
     }
     $services->module_id = $request->input('module_id');
     $services->module_name = $request->input('module_name');
     $services->service_title = $request->input('service_title');
     $services->service_name = $request->input('service_name');
     $services->service_description = $request->input('service_description');
     $services->service_url = $request->input('service_url');

     if($request->hasfile('service_img')){
        $file = $request->file('service_img')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = $request->file('service_img')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('service_img')->storeAs('uploads', $fileNameToStore);
    } else {
        $fileNameToStore = 'noimage.jpg';
    }
    $services->service_img = $fileNameToStore;
    $services->service_slug = $request->input('service_slug');
    $services->save();
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
    public function update(Request $request, $id)
    {
     $post = Input::All();
     $validatedData = $request->validate([
      'service_title' => 'required',
      'service_name' => 'required',
      'service_description' => 'required',
      'service_url' => 'required',
      'service_slug' => 'required',
  ]);


     $services = new ServiceModel();
     $services->module_id = $request->input('module_id');
     $services->module_name = $request->input('module_name');
     $services->service_title = $request->input('service_title');
     $services->service_name = $request->input('service_name');
     $services->service_description = $request->input('service_description');
     $services->service_url = $request->input('service_url');
     if($request->hasfile('service_img')){
      $file = $request->file('service_img')->getClientOriginalName();
      $filename = pathinfo($file, PATHINFO_FILENAME);
      $extension = $request->file('service_img')->getClientOriginalExtension();
      $fileNameToStore = $filename .'.'. $extension;
      $path = $request->file('service_img')->storeAs('uploads', $fileNameToStore);
  } else {
      $fileNameToStore = 'noimage.jpg';
  }
  $services->service_img = $fileNameToStore;
  $services->service_slug = $request->input('service_slug');


  $res = ServiceModel::where('id',$id)->update(
      [ 'service_title'=>$services->service_title, 
      'service_name'=>$services->service_name,
      'service_description'=>$services->service_description,
      'service_url'=>$services->service_url,
      'service_img'=>$fileNameToStore,
      'service_slug'=>$services->service_slug
  ]);
  return response()->json(['status'=>$res], $this->successStatus);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == ''){
        $services = new ServiceModel();
        $services = ServiceModel::find($id);
        $services->delete();
        return response()->json(['status'=>'deleted'], $this->successStatus);
        }else{
            return response()->json(['status'=>'not deleted'], $this->successStatus);
        }
    }

    public function spec_services()
    {
        $id = '1';
        $result = ServiceModel::where('module_id',$id)->get();
        //print_r($result);
        return response()->json(['success' => $result], $this->successStatus);
    }
}
