<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class ServicemeusModel extends Model
{
	 protected $table = 'service_menus';
    protected $fillable = [
    'service_id',
    'service_name',
    'menu_id', 
    'menu_title', 
    'menu_name',
    'menu_description',
    'menu_url',
    'menu_img',
    'menu_slug',
     ];
	
	public function serviceSubmeus(){
	    return $this->hasMany('App\api\ServicesubmeusModel','menu_id','id');
	}
	
}
