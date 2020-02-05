<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $table = 'modules';
    protected $fillable = [
    'modules_id', 
    'modules_title', 
    'modules_name',
    'modules_description',
    'modules_url',
    'modules_img',
    'modules_slug',
     ];
     
    public function services(){
        return $this->hasMany('App\api\ServiceModel','module_id', 'id');
    } 
}
