<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Support\Facades\DB;
use App\HomeGallery;
use App\Menu;
use App\SubMenu;
use App\myaccount;
use App\Requests;
use Session;
use App\vars;
use App\Homeslider;
use Illuminate\Http\Request;


class ApiController extends Controller{
  public $successStatus = 200;
  public function modules(){
    $menu = Menu::all()->load('submenu');
    return $menu;
  }
  /***************************Read Home Gallery************************************/
  public function view_homegallery(){
    $result = HomeGallery::all();
    return response()->json(['success' => $result], $this->successStatus);
  }
  /***************************Create Home Gallery************************************/
  public function create_homegallery(Request $request){
    $homegallery = new HomeGallery();
    $validator = Validator::make($request->all(), [ 
      'image_title' => 'required',
      'image_name' => 'required',
      'image_description' => 'required',  
      'image_url' => 'required', 
      'gallery_image' => 'required', 
      'image_sub_name' => 'required', 
      'image_sub_url' => 'required', 
      'gallery_sub_img' => 'required', 
      'image_slag' => 'required'
    ]);   
    if ($validator->fails()) {          
     return response()->json(['error'=>$validator->errors()], 401);
   }
   $homegallery->image_name = $request->input('image_name');
   $homegallery->image_description = $request->input('image_description');
   $homegallery->image_url = $request->input('image_url');
   if($request->hasfile('gallery_image')){
    $file = $request->file('gallery_image')->getClientOriginalName();
    $filename = pathinfo($file, PATHINFO_FILENAME);
    $extension = $request->file('gallery_image')->getClientOriginalExtension();
    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    $path = $request->file('gallery_image')->storeAs('uploads', $fileNameToStore);
  } else {
    $fileNameToStore = 'noimage.jpg';
  }
  $homegallery->gallery_image = $fileNameToStore;
  $homegallery->image_sub_name = $request->input('image_sub_name');
  $homegallery->image_sub_url = $request->input('image_sub_url');
  if($request->hasfile('gallery_sub_img')){
    $file1 = $request->file('gallery_sub_img')->getClientOriginalName();
    $filename = pathinfo($file1, PATHINFO_FILENAME);
    $extension = $request->file('gallery_sub_img')->getClientOriginalExtension();
    $fileNameToStore1 = $filename . '_' . time() . '.' . $extension;
    $path = $request->file('gallery_sub_img')->storeAs('uploads', $fileNameToStore1);
  } else {
    $fileNameToStore1 = 'noimage.jpg';
  }
  $homegallery->gallery_sub_img = $fileNameToStore1;
  $homegallery->image_slag = $request->input('image_slag');
  $homegallery->save();
  return response()->json(['status'=>'success'], $this->successStatus); 
}



/***************************Update Home Gallery************************************/
public function update_homegallery(Request $request, $id){
  $homegallery = new HomeGallery();
  $validator = Validator::make($request->all(), [ 
    'image_title' => 'required',
    'image_name' => 'required',
    'image_description' => 'required',  
    'image_url' => 'required', 
    'gallery_image' => 'required', 
    'image_sub_name' => 'required', 
    'image_sub_url' => 'required', 
    'gallery_sub_img' => 'required', 
    'image_slag' => 'required'
  ]);   
  if ($validator->fails()) {          
   return response()->json(['error'=>$validator->errors()], 401);
 }

 $post =HomeGallery::where('id',$id)->first();
 if ($post != null) {
  $gallery = HomeGallery::find($id); 
  $homegallery->image_title = $request->input('image_title');
  $homegallery->image_name = $request->input('image_name');
  $homegallery->image_description = $request->input('image_description');
  $homegallery->image_url = $request->input('image_url');
  if($request->hasfile('gallery_image')){
    $file = $request->file('gallery_image')->getClientOriginalName();
    $filename = pathinfo($file, PATHINFO_FILENAME);
    $extension = $request->file('gallery_image')->getClientOriginalExtension();
    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    $path = $request->file('gallery_image')->storeAs('uploads', $fileNameToStore);
  } else {
    $fileNameToStore = 'noimage.jpg';
  }
  $homegallery->gallery_image = $fileNameToStore;
  $homegallery->image_sub_name = $request->input('image_sub_name');
  $homegallery->image_sub_url = $request->input('image_sub_url');
  if($request->hasfile('gallery_sub_img')){
    $file1 = $request->file('gallery_sub_img')->getClientOriginalName();
    $filename = pathinfo($file1, PATHINFO_FILENAME);
    $extension = $request->file('gallery_sub_img')->getClientOriginalExtension();
    $fileNameToStore1 = $filename . '_' . time() . '.' . $extension;
    $path = $request->file('gallery_sub_img')->storeAs('uploads', $fileNameToStore1);
  } else {
    $fileNameToStore1 = 'noimage.jpg';
  }
  $homegallery->gallery_sub_img = $fileNameToStore1;
  $homegallery->image_slag = $request->input('image_slag');
    //$gallery->update($request->all());
  $res = HomeGallery::where('id',$id)->update([
    'image_title'=>$homegallery->image_title, 
    'image_name'=>$homegallery->image_name,
    'image_description'=>$homegallery->image_description,
    'image_url'=>$homegallery->image_url,
    'gallery_image'=>$homegallery->gallery_image,
    'image_sub_name'=>$homegallery->image_sub_name,
    'image_sub_url'=>$homegallery->image_sub_url,
    'gallery_sub_img'=>$homegallery->gallery_sub_img,
    'image_slag'=>$homegallery->image_slag
  ]);
  return response()->json(['status'=>'updated'], $this->successStatus); 
}else{
  return response()->json(['message'=>'not Updated '.'-'.$id.'-'.' recored not found'], $this->successStatus);
}
}
/***************************Delete Home Gallery************************************/


public function destroy($id){
  $homegallery = new HomeGallery();
  $post =HomeGallery::where('id',$id)->first();
  if ($post != null) {
    $post->delete();
    return response()->json(['status'=>'daleted'], $this->successStatus);
  }else{
    return response()->json(['message'=>'not daleted '.'-'.$id.'-'.' recored not found'], $this->successStatus);
  }
}



public function webiste_settings($id =''){
$desc = [];
     if($id != ''){
       $result = collect(\DB::select("select * from vars WHERE id ='". $id."'"))->first();
       $data = json_decode(json_encode($result), true);
   }else{
      $data = array('var_desc'=>'');
  }
  $result = collect(\DB::select("select * from vars"));
  $data = json_decode( json_encode($result), true);

 return response()->json(['status'=>$data], $this->successStatus);
}


public function var_names($var_name =''){
  $data = vars::where('var_name',$var_name)->first();
  return response()->json(['status'=>$data], $this->successStatus);
}

/********************************************Home Slider Images ******************************************************/

public function view_homeslider(){
 $result = Homeslider::all();
 return response()->json(['success' => $result], $this->successStatus);
}



public function create_homeslider(Request $request){
  $homeslider = new Homeslider();
  $validator = Validator::make($request->all(), [ 
    'slider_title' => 'required',
    'slider_name' => 'required',  
    'slider_description' => 'required', 
    'slider_url' => 'required', 
      // 'slider_img' => 'required', 
    'slider_slug' => 'required', 
  ]);   
  if ($validator->fails()) {          
   return response()->json(['error'=>$validator->errors()], 401);
 }
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
return response()->json(['status'=>'success'], $this->successStatus); 
}

public function update_homeslider(Request $request, $id){
 $homeslider = new Homeslider();
 $validator = Validator::make($request->all(), [ 
  'slider_title' => 'required',
  'slider_name' => 'required',  
  'slider_description' => 'required', 
  'slider_url' => 'required', 
  'slider_img' => 'required', 
  'slider_slug' => 'required', 
]);   
 if ($validator->fails()) {          
   return response()->json(['error'=>$validator->errors()], 401);
 }

 $post =Homeslider::where('id',$id)->first();
 if ($post != null) {
  $gallery = Homeslider::find($id); 
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
    //$gallery->update($request->all());
  $res = Homeslider::where('id',$id)->update([
    'slider_title'=>$homeslider->slider_title, 
    'slider_name'=>$homeslider->slider_name,
    'slider_description'=>$homeslider->slider_description,
    'slider_url'=>$homeslider->slider_url,
    'slider_img'=>$homeslider->slider_img,
    'slider_slug'=>$homeslider->slider_slug
  ]);
  return response()->json(['status'=>'updated'], $this->successStatus); 
}else{
  return response()->json(['message'=>'not Updated '.'-'.$id.'-'.' recored not found'], $this->successStatus);
}
}

public function destroy_homeslider($id){
  $homeslider = new Homeslider();
  $post =Homeslider::where('id',$id)->first();
  if ($post != null) {
    $post->delete();
    return response()->json(['status'=>'daleted'], $this->successStatus);
  }else{
    return response()->json(['message'=>'not daleted '.'-'.$id.'-'.' recored not found'], $this->successStatus);
  }
}




















}