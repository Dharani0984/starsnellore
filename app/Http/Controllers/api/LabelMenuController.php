<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\api\LabelsMenu;
use Validator;

class LabelMenuController extends Controller
{
        public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = LabelsMenu::all();
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
       $labels = new LabelsMenu();
       $validator = Validator::make($request->all(), [ 
          'labels_id' => 'required|max:255',
          'labels_title' => 'required|max:255',
          'labels_menu_id' => 'required',
          'labels_menu_title' => 'required|max:255',
          'labels_menu_description' => 'required|max:255',
          'labels_menu_url' => 'required',
          'labels_menu_slug' => 'required'
      ]);   

      
     if ($validator->fails()) {          
         return response()->json(['error'=>$validator->errors()], 401);
     }

     $labels->labels_id = $request->input('labels_id');
     $labels->labels_title = $request->input('labels_title');
     $labels->labels_menu_id = $request->input('labels_menu_id');
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
     //print_r($labels);
     $labels->save();
     //$labels = labels::all()->load('labels')->load('services');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
