<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot() 
    {
        parent::boot();

        static::created(function ($model) {
            $model->roles()->attach(2);
            return $model;
        });
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_roles');
    }

    public function hasRole(...$roles)
    {
       // dd($roles);

        foreach($roles as $role)
        {
            if($this->roles->contains('slug',$role))
            {
                return true;
            }
        }
        return false;
    }
}

