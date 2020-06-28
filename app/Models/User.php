<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','optional','id_rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

       protected $dates = ['deleted_at'];


    public function comentarios()
        {
            return $this->hasMany('App\Models\Comments','user_id');
        }

        public function brands()
        {
            return $this->hasMany('App\Models\Brand','user_id');
        }


       public function roles()
                            {
                        return $this->belongsTo('App\Models\Role','id_rol');
                            }

    public function authorizeRoles($roles)
                                {
                         if ($this->hasAnyRole($roles)) {
                                                    return true;
                                                         }
                                                 abort(401, 'Esta acción no está autorizada.');
                                     }

    public function hasAnyRole($roles)
                                {
                        if (is_array($roles)) {
                            foreach ($roles as $role) {
                                if ($this->hasRole($role)) {
                                        return true;
                                                            }
                                                }
                                 } else {
                         if ($this->hasRole($roles)) {
                                        return true;
                                                    }
                                        }
                          return false;
                                }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

}
