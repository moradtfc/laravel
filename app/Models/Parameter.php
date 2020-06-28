<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
     protected $table = 'parameters';


		protected $fillable = ['active_c_id', 'staging_c_id', ];

    protected $dates = ['deleted_at'];

    public function getActiveCatalogueID(){
    	$parametro=Parameter::get()->first();
    	return $parametro->active_c_id;
    }

     public function getStagingCatalogueID(){
    	$parametro=Parameter::get()->first();
    	return $parametro->staging_c_id;
    }

}
