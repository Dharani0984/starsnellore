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

class WebsiteSubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $submenu = SubMenu::where('id',$id)->get();
        $labels = Labels::with('labels_menus')->get();
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        return view('admin.view-submenu',compact('service_module','labels','submenu'));
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
        $menu = Menu::all();
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
        $menus = SubMenu::where('menu_id',$id)->get();
        $labels = Labels::with('labels_menus')->get();
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        return view('admin.add_submenu',compact('service_module','labels','menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $submenu = SubMenu::where('id',$id)->get();
       $labels = Labels::with('labels_menus')->get();
       $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
       return view('admin.edit-submenu',compact('service_module','labels','submenu'));
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
       

        $submenu = new SubMenu();
        $submenu->submenu_name = $request->submenu_name;
        $submenu->link = $request->link;
        $submenu->menu_id = $request->menu_item;
        $labels = Labels::with('labels_menus')->get();
        $menu = Menu::all();
        $service_module = Modules::with('services.servicemeus.serviceSubmeus')->get();
        $res = SubMenu::where('id',$id)->update(['id'=>$id, 
            'submenu_name'=>$submenu->submenu_name,
            'link'=>$submenu->link
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
       $submenu = new SubMenu();
      $submenu = SubMenu::find($id);
      $submenu->delete();
      return redirect("/addmenu");
    }
}
