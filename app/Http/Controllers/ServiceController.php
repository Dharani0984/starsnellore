<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Input;
use App\api\Modules;
use App\api\ServiceModel;
use App\api\ServicemeusModel;
use App\api\ServicesubmeusModel;
use Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $modules = collect(\DB::select("select * from modules where id=".$id));
      $services = collect(\DB::select("select * from services where id=".$id));
      $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
  //print_r($services);
      return view('admin.read-services',compact('service_module','modules','services'))->with('no', 1);
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
    // print_r($services);
    $services->save();
    $last_insert_id = $services->module_id;
    return redirect("/view-services/".$services->module_id);
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $modules = collect(\DB::select("select * from modules where id=".$id));
      $services = collect(\DB::select("select * from services where module_id=".$id));
      $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
  //print_r($services);
      return view('admin.services',compact('service_module','modules','services'))->with('no', 1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $services = collect(\DB::select("select * from services Where id=".$id));
      $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
  //print_r($modules);
      return view('admin.edit-services',compact('service_module','services'))->with('no', 1);
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
     $services->module_id = $request->input('module_name');
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
    return redirect("/view-services/1");
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $services = new ServiceModel();
      $services = ServiceModel::find($id);
      $services->delete();
      return redirect("/view-services/1");
    }
  }
