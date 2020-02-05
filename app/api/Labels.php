<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class Labels extends Model
{
   protected $table = 'labels';
    protected $fillable = [
    'labels_id', 
    'labels_title', 
    'labels_description',
    'labels_url',
    'labels_img',
    'labels_slug',
     ];
     
    public function labels_menus(){
        return $this->hasMany('App\api\LabelsMenu','labels_id', 'id');
    } 
}
