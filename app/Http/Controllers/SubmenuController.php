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

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
     if($id != ''){
      $service_menus = collect(\DB::select("select * from service_menus WHERE id ='". $id."'"));
      $service_submenus = collect(\DB::select("select * from service_submenus WHERE id ='". $id."'"));
    }
     $labels = Labels::with('labels_menus')->get();
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    return view('admin.read_services_submenus',compact('service_module','service_menus','service_submenus','labels'))->with('no', 1);
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
        'submenu_title' => 'required',
        'submenu_name' => 'required',
        'submenu_price' => 'required|integer',
        'submenu_description' => 'required',
        'submenu_url' => 'required',
        'submenu_slug' => 'required',
      ]);
      $service_submenu = new ServicesubmeusModel();
      $service_submenu->menu_id = $request->input('menu_id');
      $service_submenu->menu_name = $request->input('menu_name');
      $service_submenu->submenu_title = $request->input('submenu_title');
      $service_submenu->submenu_name = $request->input('submenu_name');
      $service_submenu->submenu_price = $request->input('submenu_price');
      $service_submenu->submenu_description = $request->input('submenu_description');
      $service_submenu->submenu_url = $request->input('submenu_url');
      if($request->hasfile('submenu_img')){
        $file = $request->file('submenu_img')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = $request->file('submenu_img')->getClientOriginalExtension();
        $fileNameToStore = $filename .'.'. $extension;
        $path = $request->file('submenu_img')->storeAs('uploads', $fileNameToStore);
      } else {
        $fileNameToStore = 'noimage.jpg';
      }
      $service_submenu->submenu_img = $fileNameToStore;
      $service_submenu->submenu_slug = $request->input('submenu_slug');
      $service_submenu->save();
      $last_insert_id = $service_submenu->menu_id;
      return redirect("/service_submenus/".$service_submenu->menu_id);
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
      $service_menus = collect(\DB::select("select * from service_menus WHERE id ='". $id."'"));
      $service_submenus = collect(\DB::select("select * from service_submenus WHERE menu_id ='". $id."'"));
    }
    $labels = Labels::with('labels_menus')->get();
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    return view('admin.service_submenu',compact('service_module','service_menus','service_submenus','labels'))->with('no', 1);
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     if($id != ''){
      $service_submenus = collect(\DB::select("select * from service_submenus WHERE id ='". $id."'"));
    }
     $labels = Labels::with('labels_menus')->get();
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    return view('admin.edit-service-submenu',compact('service_module','service_submenus','labels'))->with('no', 1);
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
        'submenu_title' => 'required',
        'submenu_name' => 'required',
        'submenu_description' => 'required',
        'submenu_url' => 'required',
        'submenu_slug' => 'required',
      ]);
      $service_submenu = new ServicesubmeusModel();
      $service_submenu->menu_id = $request->input('menu_id');
      $service_submenu->submenu_title = $request->input('submenu_title');
      $service_submenu->submenu_name = $request->input('submenu_name');
      $service_submenu->submenu_price = $request->input('submenu_price');
      $service_submenu->submenu_description = $request->input('submenu_description');
      $service_submenu->submenu_url = $request->input('submenu_url');
      if($request->hasfile('submenu_img')){
        $file = $request->file('submenu_img')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = $request->file('submenu_img')->getClientOriginalExtension();
        $fileNameToStore = $filename .'.'. $extension;
        $path = $request->file('submenu_img')->storeAs('uploads', $fileNameToStore);
      } else{
        $fileNameToStore = $service_submenu->submenu_img;
      }
      $service_submenu->submenu_img = $fileNameToStore;
      $service_submenu->submenu_slug = $request->input('submenu_slug');
      $res = ServicesubmeusModel::where('id',$id)->update(
        [ 'submenu_title'=>$service_submenu->submenu_title, 
        'submenu_name'=>$service_submenu->submenu_name,
        'submenu_price'=>$service_submenu->submenu_price,
        'submenu_description'=>$service_submenu->submenu_description,
        'submenu_url'=>$service_submenu->submenu_url,
        'submenu_img'=>$fileNameToStore,
        'submenu_slug'=>$service_submenu->submenu_slug
      ]);
      $last_insert_id = $service_submenu->menu_id;


      return redirect("/service_submenus/".$service_submenu->menu_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $service_submenu = new ServicesubmeusModel();
      $service_submenu = ServicesubmeusModel::find($id);
      $service_submenu->delete();
      return redirect("/service_submenus/1");
    }
  }
