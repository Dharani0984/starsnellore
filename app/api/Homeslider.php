<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class Homeslider extends Model
{
    protected $table = 'home_sliders';
    protected $fillable = [
    'slider_title', 
    'slider_name', 
    'slider_description',
    'slider_url',
    'slider_img',
    'slider_slug'
     ];
}
