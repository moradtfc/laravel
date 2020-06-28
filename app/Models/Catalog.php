<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{

	//use SoftDeletes;

    protected  $table = 'catalogues';

    protected $fillable = ['name', 'status', 'url', 'soles_symbol', 'dollar_symbol'];

    protected $dates = ['deleted_at'];
}