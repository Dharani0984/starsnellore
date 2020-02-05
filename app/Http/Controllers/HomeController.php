<?php

namespace App\Http\Controllers;
use Validator;
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
use App\api\Modules;
use App\api\ServiceModel;
use App\api\ServicemeusModel;
use App\api\ServicesubmeusModel;
use App\api\Labels;
use App\api\LabelsMenu;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //   $this->middleware('auth');
    // }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
     {
      return view('admin.index');

    }

    // Where ever you want your menu
    public function home(){
     $labels = Labels::with('labels_menus')->get();
     $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
     return view('admin.index',compact('service_module','labels'));
   }



   public function addmenu(){
    $menu = Menu::all();
    $labels = Labels::with('labels_menus')->get();
    $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
    return view('admin.add_menu',compact('service_module','labels','menu'));
  }

  public function create_menu(Request $request){
    $menu = Menu::all();
   $validatedData = $request->validate([
     'menu_name' => 'required|unique:menus|max:255',
     'url' =>  'required|unique:menus|max:255',
   ]);
   $menu = new Menu();
   $menu->menu_name = $request->menu_name;
   $menu->url = $request->url;
   $menu->save();
   $labels = Labels::with('labels_menus')->get();
   $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
   return view('admin.add_submenu',compact('service_module','labels','menu'));
 }


 public function addsubmenu(){
   $menu = Menu::all();
   $labels = Labels::with('labels_menus')->get();
   $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
   return view('admin.add_submenu',compact('service_module','labels','menu'));
 }


 public function createsubmenu(Request $request){
  $validatedData = $request->validate([
   'submenu_name' => 'required|unique:sub_menus|max:255',
   'link' =>  'required|unique:sub_menus|max:255',
   'menu_item' => 'required',
 ]);

  $submenu = new SubMenu();
  $submenu->submenu_name = $request->submenu_name;
  $submenu->link = $request->link;
  $submenu->menu_id = $request->menu_item;
  $submenu->save();
  $labels = Labels::with('labels_menus')->get();
  $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
  return view('admin.add_menu',compact('service_module','labels'));
}


public function myaccount(Request $request){
  $result = collect(\DB::select("select * from myaccount"))->first();
  $data = json_decode( json_encode($result), true);
  Session::put('data',$data);
  $labels = Labels::with('labels_menus')->get();
  $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
  return view('admin.myaccount',compact('service_module','labels'));
}


public function create_myaccount(Request $request){
  $myaccount = new Myaccount();
  $myaccount->name = $request->input('name');
  if($request->hasfile('photo')){
    $myaccount->photo = $request->file('photo')->getClientOriginalName();
    $filename = pathinfo($myaccount->photo, PATHINFO_FILENAME);
    $extension = $request->file('photo')->getClientOriginalExtension();
    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    $path = $request->file('photo')->storeAs('uploads', $fileNameToStore);
  } else {
    $fileNameToStore = 'noimage.jpg';
  }
  $myaccount->dob = $request->input('dob');
  $myaccount->fname = $request->input('fname');
  $myaccount->mname = $request->input('mname');
  $myaccount->mname = $request->input('mname');
  $myaccount->phone = $request->input('phone');
  $myaccount->email = $request->input('email');
  $myaccount->address = $request->input('address');

  $res = myaccount::where('name',$myaccount->name)->update(['name'=>$myaccount->name, 
    'photo'=>$myaccount->photo,
    'dob'=>$myaccount->dob,
    'fname'=>$myaccount->fname,
    'mname'=>$myaccount->mname,
    'photo'=>$myaccount->photo,
    'phone'=>$myaccount->phone,
    'email'=>$myaccount->email,
    'address'=>$myaccount->address]
  );
    //$res = $myaccount->update();
    //$menu = Menu::all()->load('submenu');
  return redirect('/myaccount');
}



public function profile(){
 $labels = Labels::with('labels_menus')->get();
 $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
 return view('admin.profile',compact('service_module','labels'));
}


public function websitesettings($id =''){
    //echo $id;exit;
  $desc = [];
  if($id != ''){
   $result = collect(\DB::select("select * from vars WHERE id ='". $id."'"))->first();
   $desc = json_decode(json_encode($result), true);
 }else{
  $desc = array('var_desc'=>'');
}
$result = collect(\DB::select("select * from vars"));
$data = json_decode( json_encode($result), true);

$service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
$labels = Labels::with('labels_menus')->get();
return view('admin.websitesettings',compact('service_module' , 'data', 'desc','labels'));
}




public function vars(){
  $result = collect(\DB::select("select * from vars"));
  $data = json_decode( json_encode($result), true);
  $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
  $labels = Labels::with('labels_menus')->get();
  return view('admin.vars',compact('service_module','data','labels'));
}

public function create_var(Request $request){
  $var = new vars();
  $var->var_title = $request->input('var_title');
  $var->var_name = $request->input('var_name');
  $var->var_type = $request->input('var_type');
  $var->var_desc = "";
  $var->save();
  return redirect('/vars');
}

public function create_var_desc(Request $request){
  $var = new vars();
  $var->var_type = $request->input('var_type');
  $var->var_desc = $request->input('var_desc');
  $res = vars::where('id',$var->var_type)->update(['var_desc'=>$var->var_desc]);
  return redirect('/websitesettings/'.$var->var_type);

}

public function edit_var(){
 $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
 $labels = Labels::with('labels_menus')->get();
 return view('admin.edit_var',compact('service_module','data','labels'));
}



}