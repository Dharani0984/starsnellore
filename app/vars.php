<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vars extends Model
{
     protected $fillable = [
    'var_title', 'var_name', 'var_type','var_desc'
];
}
