<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	return redirect('/login');
});
Auth::routes();



Route::get('/background-images', 'HomeSliderController@index');
Route::get('/view-home-slider/{id}', 'HomeSliderController@show');
Route::post('/create-home-slider', 'HomeSliderController@store');
Route::get('/edit-home-slider/{id}', 'HomeSliderController@edit');
Route::post('/update-home-slider/{id}', 'HomeSliderController@update');
Route::get('/delete-home-slider/{id}', 'HomeSliderController@destroy');



Route::get('/HomeGallery','GalleryController@index');
Route::post('/create-home-gallery','GalleryController@store');
Route::get('/view-gallery/{id}','GalleryController@show');
Route::get('/edit-gallery/{id}','GalleryController@edit');
Route::post('/edit-homegallery/{id}','GalleryController@update');
Route::get('/delete-gallery/{id}','GalleryController@destroy');


Route::get('/myaccount', 'MyaccountController@index');
Route::post('/createmyaccount', 'MyaccountController@update');
Route::get('/profile', 'MyaccountController@create');


Route::get('/websitesettings/{id?}' , 'Websitesettings@show');
Route::post('/create-var-desc','Websitesettings@store');




Route::get('/vars','VarController@index');
Route::post('/create-var','VarController@store');
Route::get('/edit-var/{id}','VarController@edit');
Route::post('/update-var/{id}','VarController@update');


Route::get('/addmenu','WebsiteMenuController@index');
Route::get('/view-menu/{id}','WebsiteMenuController@show');
Route::post('/create_menu','WebsiteMenuController@store');
Route::get('/edit-menu/{id}','WebsiteMenuController@edit');
Route::post('/update-menu/{id}','WebsiteMenuController@update');
Route::get('/delete-menu/{id}','WebsiteMenuController@destroy');


Route::get('/view-submenu/{id}','WebsiteSubmenuController@index');
Route::get('/addsubmenu/{id}','WebsiteSubmenuController@show');
Route::post('/createsubmenu','WebsiteSubmenuController@store');
Route::get('/edit-submenu/{id}','WebsiteSubmenuController@edit');
Route::post('/update-submenu/{id}','WebsiteSubmenuController@update');
Route::get('/delete-submenu/{id}','WebsiteSubmenuController@destroy');


Route::get('/home','ModuleController@index');
Route::get('/view-service-modules','ModuleController@show');
Route::post('/add-service-modules','ModuleController@store');
Route::get('/edit-service-modules/{id}','ModuleController@edit');
Route::post('/update-service-modules/{id}','ModuleController@update');
Route::get('/delete-service-modules/{id}','ModuleController@destroy');

Route::get('read-services/{id}','ServiceController@index');
Route::get('view-services/{id}','ServiceController@show');
Route::post('/add-services/{id}','ServiceController@store');
Route::get('/edit-services/{id}','ServiceController@edit');
Route::post('/update-services/{id}','ServiceController@update');
Route::get('/delete-services/{id}','ServiceController@destroy');


Route::get('/read-service_menus/{id}' ,'MenuController@index');
Route::get('/view_services_menus/{id}' ,'MenuController@show');
Route::post('/add_service_menu' ,'MenuController@store');
Route::get('/edit-service-menu/{id}' ,'MenuController@edit');
Route::post('/update_service_menus/{id}' ,'MenuController@update');
Route::get('/delete-service-menu/{id}' ,'MenuController@destroy');


Route::get('/read-service-submenu/{id}' ,'SubmenuController@index');
Route::get('/service_submenus/{id}' ,'SubmenuController@show');
Route::post('/add_service_submenu' ,'SubmenuController@store');
Route::get('/edit-service-submenu/{id}' ,'SubmenuController@edit');
Route::post('/update_service_submenus/{id}' ,'SubmenuController@update');
Route::get('/delete-service-submenu/{id}' ,'SubmenuController@destroy');


Route::get('/view-labels', 'LabelController@index');
Route::get('/view-label/{id}', 'LabelController@show');
Route::post('/add-labels', 'LabelController@store');
Route::get('/edit-labels/{id}', 'LabelController@edit');
Route::post('/update-labels/{id}', 'LabelController@update');
Route::get('/delete-labels/{id}', 'LabelController@destroy');


Route::get('/view-labels-menus/{id}', 'LabelsMenuController@show');
Route::post('/add-label_menu/{id}', 'LabelsMenuController@store');
Route::get('/edit-labels-menu/{id}', 'LabelsMenuController@edit');
Route::post('/update-label_menu/{id}', 'LabelsMenuController@update');
Route::get('/delete-labels-menu/{id}', 'LabelsMenuController@destroy');












