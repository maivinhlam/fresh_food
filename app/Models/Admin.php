<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function slide()
    {
        return $this->belongsTo(User::class);
    }

    public function hasPermission(Permission $permission)
    {
        return !! optional(optional($this->role)->permissions)->contains($permission);
    }

    public function isSystemAdmin()
    {
        if($this->role->name === 'system_admin' ) {
            return true;
        }
    }

    public function isAdmin()
    {
        if($this->role->name === 'admin' ) {
            return true;
        }
    }

}
