<?php

use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



/*********************************Home Gallety Images(1000)************************************************/
Route::get('/menu/menuitems/1001','ApiController@modules');
Route::get('/gallery/gallery_list/2000','ApiController@view_homegallery');
Route::post('/gallery/gallery_list/2001','ApiController@create_homegallery');
Route::post('/gallery/gallery_list/2002/{id?}','ApiController@update_homegallery');
Route::delete('/gallery/gallery_list/2003/{id?}','ApiController@destroy');

/*********************************Home Slider Images(2000)**************************************************/

Route::get('/wsslider/slider/2000', 'api\HomeSliderController@view_homeslider');
Route::post('/wsslider/slider//2001', 'api\HomeSliderController@create_homeslider');
Route::post('/wsslider/slider/2002/{id}', 'api\HomeSliderController@update_homeslider');
Route::delete('/wsslider/slider/2003/{id?}', 'api\HomeSliderController@destroy_homeslider');

/*************************************Website settings data**********************************************/

Route::get('/wssettings', 'ApiController@webiste_settings');
Route::get('/wssettings/{var_name}', 'ApiController@var_names');

/***********************************Socilmedia Information**************************************************/

// Route::get('/wssocilmedia/wsinformation/4000/2000', 'api\HomeSliderController@view_homeslider');

/***********************************Modules**************************************************/

Route::get('/module/module_list/2000', 'api\ModuleController@index');
Route::post('/module/module_list/2001', 'api\ModuleController@store');
Route::get('/module/module_list/{id}', 'api\ModuleController@show');
Route::post('/module/module_list/2002/{id}', 'api\ModuleController@update');
Route::delete('/module/module_list/2003/{id}', 'api\ModuleController@destroy');
/***********************************services**************************************************/

Route::get('/service/service_list/2000', 'api\ServiceController@index');
Route::get('/service/service_list/2000/{id}', 'api\ServiceController@spec_services');
Route::post('/service/service_list/2001', 'api\ServiceController@store');
Route::get('/service/service_list/{id}', 'api\ServiceController@show');
Route::post('/service/service_list/2002/{id}', 'api\ServiceController@update');
Route::delete('/service/service_list/2003/{id}', 'api\ServiceController@destroy');
/***********************************menus**************************************************/

Route::get('/menu/menu_list/2000', 'api\MenuController@index');
Route::post('/menu/menu_list/2001', 'api\MenuController@store');
Route::get('/menu/menu_list/{id}', 'api\MenuController@show');
Route::post('/menu/menu_list/2002/{id}', 'api\MenuController@update');
Route::delete('/menu/menu_list/2003/{id}', 'api\MenuController@destroy');
/***********************************submenus**************************************************/

Route::get('/submenu/submenu_list/2000', 'api\SubmenuController@index');
Route::post('/submenu/submenu_list/2001', 'api\SubmenuController@store');
Route::get('/submenu/submenu_list/{id}', 'api\SubmenuController@show');
Route::post('/submenu/submenu_list/2002/{id}', 'api\SubmenuController@update');
Route::delete('/submenu/submenu_list/2003/{id}', 'api\SubmenuController@destroy');
/***********************************service details**************************************************/

Route::get('/service/menu/submenu_list/{id}', 'api\ModuleController@view_spec_module_data');
Route::get('/modules/service/menu/submenu_list/2000', 'api\ModuleController@view_services_details');
Route::get('/wsservice/service', 'api\ModuleController@view_service_data');



/***************************************************************************************************/



Route::get('/wslabels/labels/2000', 'api\LabelController@index');
Route::get('/wslabels/labels/2001', 'api\LabelController@store');




Route::get('/wslabels/labels-menu/2000', 'api\LabelMenuController@index');
Route::get('/wslabels/labels-menu/2001', 'api\LabelMenuController@store');




Route::get('/wslabels/menus/{id}', 'api\LabelController@view_separate_labels');

Route::get('/wslabels/menus', 'api\LabelController@view_all_labels');



