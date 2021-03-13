<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'session_id'
    ];

    public function details()
    {
        return $this->hasMany(CartDetail::class, 'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
