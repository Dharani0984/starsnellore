<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class LabelsMenu extends Model
{
    protected $table = 'labels_menu';
    protected $fillable = [
    'labels_id', 
    'labels_title', 
    'labels_menu_id', 
    'labels_menu_title', 
    'labels_menu_description',
    'labels_menu_url',
    'labels_menu_img',
    'labels_menu_slug',
     ];
}
