<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Menu;
use App\SubMenu;
use App\Myaccount;
use App\Requests;
use Session;
use App\vars;
use App\HomeGallery;
use App\HomeSlider;
use App\api\Modules;
use App\api\ServiceModel;
use App\api\ServicemeusModel;
use App\api\ServicesubmeusModel;
use App\api\Labels;
use App\api\LabelsMenu;

class HomeSliderController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $bg_images = Homeslider::all();
    $labels = Labels::with('labels_menus')->get();
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    return view('admin.bg_images',compact('service_module','bg_images','labels'));
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
        'slider_title' => 'required',
        'slider_name' => 'required',  
        'slider_description' => 'required', 
        'slider_url' => 'required', 
        'slider_img' => 'required', 
        'slider_slug' => 'required', 
    ]);   
    $homeslider = new Homeslider();
    $homeslider->slider_title = $request->input('slider_title');
    $homeslider->slider_name = $request->input('slider_name');
    $homeslider->slider_description = $request->input('slider_description');
    $homeslider->slider_url = $request->input('slider_url');
    if($request->hasfile('slider_img')){
        $file = $request->file('slider_img')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = $request->file('slider_img')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('slider_img')->storeAs('uploads', $fileNameToStore);
    } else {
        $fileNameToStore = 'noimage.jpg';
    }
    $homeslider->slider_img = $fileNameToStore;
    $homeslider->slider_slug = $request->input('slider_slug');
    $homeslider->save();
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    $labels = Labels::with('labels_menus')->get();
    return redirect('/background-images');
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
    $slider_data = Homeslider::where('id',$id)->get();
    $labels = Labels::with('labels_menus')->get();
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    return view('admin.view-home-slider',compact('service_module','slider_data','labels'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
	$bg_images = Homeslider::where('id',$id)->get();
    $labels = Labels::with('labels_menus')->get();
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    return view('admin.edit-homeslider',compact('service_module','bg_images','labels'));
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

    $validatedData = $request->validate([
        'slider_title' => 'required',
        'slider_name' => 'required',  
        'slider_description' => 'required', 
        'slider_url' => 'required', 
        'slider_slug' => 'required', 
    ]);   

    $homeslider = new Homeslider();
    $post =Homeslider::where('id',$id)->first();
    $gallery = Homeslider::find($id); 
    $homeslider->slider_title = $request->input('slider_title');
    $homeslider->slider_name = $request->input('slider_name');
    $homeslider->slider_description = $request->input('slider_description');
    $homeslider->slider_url = $request->input('slider_url');
    if($request->hasfile('slider_img')){
        $file = $request->file('slider_img')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = $request->file('slider_img')->getClientOriginalExtension();
        $fileNameToStore = $filename . '.' . $extension;
        $path = $request->file('slider_img')->storeAs('uploads', $fileNameToStore);
    } else {
        $fileNameToStore = 'noimage.jpg';
    }
    $homeslider->slider_img = $fileNameToStore;
    $homeslider->slider_slug = $request->input('slider_slug');
    $res = Homeslider::where('id',$id)->update([
        'slider_title'=>$homeslider->slider_title, 
        'slider_name'=>$homeslider->slider_name,
        'slider_description'=>$homeslider->slider_description,
        'slider_url'=>$homeslider->slider_url,
        'slider_img'=>$homeslider->slider_img,
        'slider_slug'=>$homeslider->slider_slug
    ]);
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    $labels = Labels::with('labels_menus')->get();
    return redirect('/background-images');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    $homeslider = new Homeslider();
    $homeslider = Homeslider::find($id);
    $homeslider->delete();
    return redirect('/background-images');

}

}
