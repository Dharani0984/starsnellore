<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\api\Modules;
use App\api\ServiceModel;
use App\api\ServicemeusModel;
use App\api\ServicesubmeusModel;
use App\api\Labels;
use App\api\LabelsMenu;
use Validator;

class LabelsMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      'labels_id' => 'required|max:255',
      'labels_title' => 'required|max:255',
      'labels_menu_title' => 'required|max:255',
      'labels_menu_description' => 'required|max:255',
      'labels_menu_url' => 'required',
      'labels_menu_slug' => 'required'
    ]);   
     $labels = new LabelsMenu();
     $labels->labels_id = $request->input('labels_id');
     $labels->labels_title = $request->input('labels_title');
     $labels->labels_menu_title = $request->input('labels_menu_title');
     $labels->labels_menu_description = $request->input('labels_menu_description');
     $labels->labels_menu_url = $request->input('labels_menu_url');
     if($request->hasfile('labels_menu_img')){
       $file = $request->file('labels_menu_img')->getClientOriginalName();
       $filename = pathinfo($file, PATHINFO_FILENAME);
       $extension = $request->file('labels_menu_img')->getClientOriginalExtension();
       $fileNameToStore = $filename . '.' . $extension;
       $path = $request->file('labels_menu_img')->storeAs('uploads', $fileNameToStore);
     } else {
       $fileNameToStore = 'noimage.jpg';
     }
     $labels->labels_menu_img = $fileNameToStore;
     $labels->labels_menu_slug = $request->input('labels_menu_slug');
     $labels->save();
     return redirect('/view-labels-menus/'. $labels->labels_id);
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $modules = collect(\DB::select("select * from modules"));
      $labels = Labels::where('id',$id)->with('labels_menus')->get();
      $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
      return view('admin.labels_menu',compact('service_module','modules','labels'))->with('no', 1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $labels = Labels::where('id',$id)->with('labels_menus')->get();
      $labels_menus = collect(\DB::select("select * from labels_menu Where id=".$id));
      $labels1 = Labels::with('labels_menus')->get();
      $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
      return view('admin.edit-labels-menu',compact('service_module','labels1','labels_menus','labels'))->with('no', 1);
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
        'labels_id' => 'required|max:255',
        'labels_title' => 'required|max:255',
        'labels_menu_title' => 'required|max:255',
        'labels_menu_description' => 'required|max:255',
        'labels_menu_url' => 'required',
        'labels_menu_slug' => 'required'
      ]);   
      $labels = new LabelsMenu();
      $labels->labels_id = $request->input('labels_id');
      $labels->labels_title = $request->input('labels_title');
      $labels->labels_menu_title = $request->input('labels_menu_title');
      $labels->labels_menu_description = $request->input('labels_menu_description');
      $labels->labels_menu_url = $request->input('labels_menu_url');
      if($request->hasfile('labels_menu_img')){
       $file = $request->file('labels_menu_img')->getClientOriginalName();
       $filename = pathinfo($file, PATHINFO_FILENAME);
       $extension = $request->file('labels_menu_img')->getClientOriginalExtension();
       $fileNameToStore = $filename . '.' . $extension;
       $path = $request->file('labels_menu_img')->storeAs('uploads', $fileNameToStore);
     } else {
       $fileNameToStore = 'noimage.jpg';
     }
     $labels->labels_menu_img = $fileNameToStore;
     $labels->labels_menu_slug = $request->input('labels_menu_slug');

     $res = LabelsMenu::where('id',$id)->update(
      [ 
        'labels_menu_title'=>$labels->labels_menu_title, 
        'labels_menu_description'=>$labels->labels_menu_description,
        'labels_menu_url'=>$labels->labels_menu_url,
        'labels_menu_img'=>$fileNameToStore,
        'labels_menu_slug'=>$labels->labels_menu_slug
      ]);
     return redirect('/view-labels');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $labels = new LabelsMenu();
      $labels = LabelsMenu::find($id);
      $labels->delete();
      return redirect("/view-labels");
    }
  }
