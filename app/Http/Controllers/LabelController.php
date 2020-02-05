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

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = collect(\DB::select("select * from modules"));
        $labels = Labels::all();
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        return view('admin.labels',compact('service_module','modules','labels'))->with('no', 1);
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
      'labels_title' => 'required|max:255',
      'labels_description' => 'required|max:255',
      'labels_url' => 'required|max:255',
      'labels_slug' => 'required'
    ]);   
     $labels = new Labels();
    // $labels->labels_id = $request->input('labels_id');
     $labels->labels_title = $request->input('labels_title');
     $labels->labels_description = $request->input('labels_description');
     $labels->labels_url = $request->input('labels_url');
     if($request->hasfile('labels_img')){
       $file = $request->file('labels_img')->getClientOriginalName();
       $filename = pathinfo($file, PATHINFO_FILENAME);
       $extension = $request->file('labels_img')->getClientOriginalExtension();
       $fileNameToStore = $filename . '.' . $extension;
       $path = $request->file('labels_img')->storeAs('uploads', $fileNameToStore);
     } else {
       $fileNameToStore = 'noimage.jpg';
     }
     $labels->labels_img = $fileNameToStore;
     $labels->labels_slug = $request->input('labels_slug');
     $labels->save();
     return redirect('/view-labels/'. $labels->labels_id);
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
       $labels1 = Labels::where('id',$id)->get();
       $labels = Labels::all();
       $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
       return view('admin.view-label',compact('service_module','modules','labels','labels1'))->with('no', 1);
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $modules = collect(\DB::select("select * from modules"));
       $labels = Labels::where('id',$id)->get();
       $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
       return view('admin.edit-labels',compact('service_module','modules','labels'))->with('no', 1);
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
      'labels_title' => 'required|max:255',
      'labels_description' => 'required|max:255',
      'labels_url' => 'required|max:255',
      'labels_slug' => 'required'
    ]);   
     $labels = new Labels();
    // $labels->labels_id = $request->input('labels_id');
     $labels->labels_title = $request->input('labels_title');
     $labels->labels_description = $request->input('labels_description');
     $labels->labels_url = $request->input('labels_url');
     if($request->hasfile('labels_img')){
       $file = $request->file('labels_img')->getClientOriginalName();
       $filename = pathinfo($file, PATHINFO_FILENAME);
       $extension = $request->file('labels_img')->getClientOriginalExtension();
       $fileNameToStore = $filename . '.' . $extension;
       $path = $request->file('labels_img')->storeAs('uploads', $fileNameToStore);
     } else {
       $fileNameToStore = 'noimage.jpg';
     }
     $labels->labels_img = $fileNameToStore;
     $labels->labels_slug = $request->input('labels_slug');
    
     $res = Labels::where('id',$id)->update(
      [ 
        'labels_title'=>$labels->labels_title, 
        'labels_description'=>$labels->labels_description,
        'labels_url'=>$labels->labels_url,
        'labels_img'=>$fileNameToStore,
        'labels_slug'=>$labels->labels_slug
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
        $labels = new Labels();
      $labels = Labels::find($id);
      $labels->delete();
      return redirect("/view-labels");
    }
}
