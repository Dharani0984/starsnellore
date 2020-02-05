<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeGallery extends Model
{
    protected $table = 'homegallery';
    protected $fillable = [
    'image_title', 
    'image_name', 
    'image_description',
    'image_url',
    'gallery_image',
    'image_sub_name',
    'image_sub_url',
    'gallery_sub_img',
    'image_slag' ];
}
