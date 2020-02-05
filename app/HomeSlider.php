<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
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
