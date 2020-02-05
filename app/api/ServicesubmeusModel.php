<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class ServicesubmeusModel extends Model
{
    protected $table = 'service_submenus';
    protected $fillable = [
    'menu_id',
    'menu_name',
    'submenu_id', 
    'submenu_title', 
    'submenu_name',
    'submenu_price',
    'submenu_description',
    'submenu_url',
    'submenu_img',
    'submenu_slug',
     ];
}
