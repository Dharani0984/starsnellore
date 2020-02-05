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

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
     $gallery = HomeGallery::all();
     $labels = Labels::with('labels_menus')->get();
     $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
     return view('admin.homegallery',compact('service_module','gallery','labels'));
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
       'image_title' => 'required',
       'image_name' => 'required',
       'image_description' => 'required',
       'image_url' => 'required',
       'gallery_image' => 'required',
       'image_sub_name' => 'required',
       'image_sub_url' => 'required',
       'gallery_sub_img' => 'required',
       'image_slag' => 'required',
     ]);
     $homegallery = new HomeGallery();
     $homegallery->image_title = $request->input('image_title');
     $homegallery->image_name = $request->input('image_name');
     $homegallery->image_description = $request->input('image_description');
     $homegallery->image_url = $request->input('image_url');
     if($request->hasfile('gallery_image')){
      $file = $request->file('gallery_image')->getClientOriginalName();
      $filename = pathinfo($file, PATHINFO_FILENAME);
      $extension = $request->file('gallery_image')->getClientOriginalExtension();
      $fileNameToStore = $filename . '_' .time() . '.' . $extension;
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
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    return redirect('/HomeGallery');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if(!empty($id)){
        $view_id = HomeGallery::find($id); 
        $gallery_single_data = DB::select("select * from homegallery where id = $id");
      }
      $labels = Labels::with('labels_menus')->get();
      $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
      return view('admin.view-gallery',compact('service_module','gallery_single_data','labels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $gallery = HomeGallery::all();
      $view_id = HomeGallery::find($id); 
      $gallery_single_data = DB::select("select * from homegallery where id = $id");
      $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
      $labels = Labels::with('labels_menus')->get();
      return view('admin.edit-gallery',compact('service_module','gallery','gallery_single_data','labels'));
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
      if(!empty($id)){
        $view_id = HomeGallery::find($id); 
        $gallery_single_data = DB::select("select * from homegallery where id = $id");
        $homegallery = new HomeGallery();
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
        $res = homegallery::where('id',$id)->update(
          [ 'image_title'=>$homegallery->image_title, 
          'image_name'=>$homegallery->image_name,
          'image_description'=>$homegallery->image_description,
          'image_url'=>$homegallery->image_url,
          'gallery_image'=>$homegallery->gallery_image,
          'image_sub_name'=>$homegallery->image_sub_name,
          'image_sub_url'=>$homegallery->image_sub_url,
          'gallery_sub_img'=>$homegallery->gallery_sub_img,
          'image_slag'=>$homegallery->image_slag
        ]);
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        return redirect('/HomeGallery');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $homegallery = new HomeGallery();
      $homegallery = HomeGallery::find($id);
      $homegallery->delete();
      return redirect('/HomeGallery');
    }
  }
