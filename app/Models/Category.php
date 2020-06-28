<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';

      use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'color_code', 'order','icon_path', 'icon_url',
        'icon_url_alternative', 'icon_additional_path','pdf_url','active_url',
    ];

    protected $dates = ['deleted_at'];

   
}
