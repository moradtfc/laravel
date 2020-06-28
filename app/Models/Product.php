<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

     use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'points', 'last_points','price','points_price', 'impression_views','visit_views', 'state','photo_path','photo_url','photo_url','photo_url_alternative','final_url','active_url','sku','stock','tags','real_value','detail','catalogue_id','brand_id','category_id','es_licor',

    ];

    protected $dates = ['deleted_at'];

    //-------------------RELACIONES-----------------
    					public function catalog()
                            {
                        return $this->belongsTo('App\Models\Catalog','catalogue_id');
                            }

                            public function brand()
                            {
                        return $this->belongsTo('App\Models\Brand','brand_id');
                            }

                            public function category()
                            {
                        return $this->belongsTo('App\Models\Category','category_id');
                            }

                            public function comentarios()
                            {
                                return $this->hasMany('App\Models\Comments','product_id');

                            }



    //-------------------FILTROS-----------------

                            public function ScopeActiveCatalogue($query,$idActivo){

                                return $query->where('catalogue_id', '=', "$idActivo");
                            }

                            public function ScopeStagingCatalogue($query,$idStaging){

                                return $query->where('catalogue_id', '=', "$idStaging");
                            }

                            public function ScopeAllCatalogues($query,$idActive,$idStaging){

                                return $query->whereIn('catalogue_id', [$idActive,$idStaging]);
                            }

                             public function scopeActive($query)
                                {
                             $query->where('state','1');
                                }

                            public function ScopeFilterCategories($query,$categories=null){

                                if($categories){
                                    $query->whereHas('category', function($q) use ($categories){
                                    $q->whereIn('id',$categories);
                                                });
                                        }

                            }

                            public function ScopeSearch($query,$search){

                                if($search){

                                $query->whereHas('brand', function($q) use ($search){
                                                $q->where('name','LIKE',"%$search%");
                                                });

                                $query->orWhere('name','LIKE',"%$search%");
                                $query->orWhere('tags','LIKE',"%$search%");

                            }
                        }

                        public function ScopeMinPoints($query,$minPoints){

                               if($minPoints){

                                return $query->where('points', '>=', "$minPoints");
                            }
                            }

                        public function ScopeMaxPoints($query,$maxPoints){

                            if($maxPoints){

                                return $query->where('points', '<=', "$maxPoints");

                                 }
                            }

                        public function ScopeFilterValue($query,$minValue,$maxValue){

                            if($minValue){

                                return $query->where('real_value', '>=', "$minValue");

                                 }

                            if($maxValue){

                                return $query->where('real_value', '<=', "$maxValue");

                                 }
                            }




}
