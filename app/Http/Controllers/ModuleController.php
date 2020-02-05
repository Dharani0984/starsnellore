<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Input;
use App\api\Modules;
use App\api\ServiceModel;
use App\api\ServicemeusModel;
use App\api\ServicesubmeusModel;
use App\api\Labels;
use Validator;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $service_module = collect(\DB::select("select * from modules"));
     $labels = Labels::with('labels_menus')->get();
     $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
     return view('admin.index',compact('service_module','labels'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        'modules_title' => 'required',
        'modules_name' => 'required',
        'modules_description' => 'required',
        'modules_url' => 'required',
        'modules_slug' => 'required',
      ]);
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
      $Modules->save();
      $last_insert_id = $Modules->service_id;
      return redirect("/view-service-modules");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $modules = collect(\DB::select("select * from modules"));
       $labels = Labels::with('labels_menus')->get();
      $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
      return view('admin.services_modules',compact('service_module','modules','labels'))->with('no', 1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $modules = collect(\DB::select("select * from modules Where id=".$id));
     $labels = Labels::with('labels_menus')->get();
     $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
  //print_r($modules);
     return view('admin.edit-services-modules',compact('service_module','modules','labels'))->with('no', 1);
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
        'modules_title' => 'required',
        'modules_name' => 'required',
        'modules_description' => 'required',
        'modules_url' => 'required',
        'modules_slug' => 'required',
      ]);
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
      return redirect("/view-service-modules");
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
      return redirect("/view-service-modules");
    }
  }
