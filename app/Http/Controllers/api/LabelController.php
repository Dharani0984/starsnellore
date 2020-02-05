<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\api\Labels;
use Validator;

class LabelController extends Controller
{
     public $successStatus = 200;
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Labels::all();
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
       $labels = new Labels();
       $validator = Validator::make($request->all(), [ 
          'labels_title' => 'required|unique:labels|max:255',
          'labels_description' => 'required|max:255',
          'labels_url' => 'required|unique:labels',
          'labels_slug' => 'required'
      ]);   

       if ($validator->fails()) {          
         return response()->json(['error'=>$validator->errors()], 401);
     }

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

    public function view_separate_labels($id){
        //$data = Labels::all();
        $data = Labels::where('id',$id)->with('labels_menus')->first();
        return response()->json(['labels' => $data], $this->successStatus);

    }


    public function view_all_labels(){
        $labels = Labels::with('labels_menus')->get();
       // print_r($labels)
        return response()->json(['labels' => $labels], $this->successStatus);

    }
}
