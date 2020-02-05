<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class WebsiteMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        $labels = Labels::with('labels_menus')->get();
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        return view('admin.add_menu',compact('service_module','labels','menu'));
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
        return view('admin.add_menu',compact('service_module','labels','menu'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::where('id',$id)->get();
        $labels = Labels::with('labels_menus')->get();
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        return view('admin.view-menu',compact('service_module','labels','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $menu = Menu::where('id',$id)->get();
       $labels = Labels::with('labels_menus')->get();
       $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
       return view('admin.edit-menu',compact('service_module','labels','menu'));
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
        $menu = Menu::all();
        $validatedData = $request->validate([
           'menu_name' => 'required|max:255',
           'url' =>  'required|max:255',
       ]);
        $menu = new Menu();
        $menu->menu_name = $request->menu_name;
        $menu->url = $request->url;
        $labels = Labels::with('labels_menus')->get();
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        $res = Menu::where('id',$id)->update(['id'=>$id, 
            'menu_name'=>$menu->menu_name,
            'url'=>$menu->url
        ]
    );
        return redirect('/addmenu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $menu = new Menu();
      $menu = Menu::find($id);
      $menu->delete();
      return redirect("/addmenu");
    }
}
