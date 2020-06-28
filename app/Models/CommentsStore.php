<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentsStore extends Model
{
    use SoftDeletes;

    protected $table = 'comentariosmarcas';

    protected $fillable = ['contenido','state','user_id','brand_id'];

    protected $dates = ['deleted_at'];

    public function brand(){
    	return $this->belongsTo('App\Models\Brand','brand_id','id');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User','user_id','id');
    }
}
