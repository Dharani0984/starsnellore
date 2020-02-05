<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use App\api\Homeslider;

class HomesliderController extends Controller
{
  public $successStatus = 200;



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
