<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{

     use SoftDeletes;
     protected $table = 'brands';

      //use SoftDeletes;

    protected $fillable = [
        'name', 'web', 'email', 'photo_path','photo_url', 'photo_url_alt',
        'final_url', 'active_url',
    ];



    public function products()
    {
        return $this->hasMany('App\Models\Product','brand_id');
    }
    public function commentStore()
    {
        return $this->hasMany('App\Models\CommentsStore','brand_id');
    }

    public function stores()
    {
        return $this->hasMany('App\Models\Store','brand_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }


/*
    public function setPhotoPathAttribute($value)
    {
        $this->attributes['photo_path'] = $value;
        $this->attributes['photo_url'] = \Storage::disk('s3')->url($value);
    }

    public function setActiveUrlAttribute($value)
    {
        $this->attributes['active_url'] = $value;

        if($value == 'photo_url'){
            $this->attributes['final_url'] = $this->photo_url;
        }
        elseif ($value == 'photo_url_alt') {
            $this->attributes['final_url'] = $this->photo_url_alt;
        }
        else {
            $this->attributes['final_url'] = null;
        }
    }*/

    public function ScopeStagingCatalogue($query,$idStaging){

        return $query->where('catalogue_id', '=', "$idStaging");
    }


}
