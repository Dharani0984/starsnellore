<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    protected $table = 'services';
    protected $fillable = [
    'module_id', 
    'module_name', 
    'service_id', 
    'service_title', 
    'service_name',
    'service_description',
    'service_url',
    'service_img',
    'service_slug',
     ];
     
    public function servicemeus(){
        return $this->hasMany('App\api\ServicemeusModel','service_id','id');
    } 

    
    
}
