<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    //
     use SoftDeletes;

    protected $table = 'stores';

    protected $fillable = [
        'name', 'address', 'latitude','contact', 'longitude','url_1', 'url_2','brand_id',
    ];



    public function brands()
    {
        return $this->belongsTo('App\Models\Brand','brand_id','id');
    }
}
