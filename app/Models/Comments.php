<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{

use SoftDeletes;

    protected $table = 'comentarios';

    protected $fillable = ['contenido','state','user_id','product_id'];

    protected $dates = ['deleted_at'];

    public function product(){
    	return $this->belongsTo('App\Models\Product','product_id','id');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User','user_id','id');
    }

}
