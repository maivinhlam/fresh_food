<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'brand_id',
        'name',
        'price',
        'sell_percen',
        'amount',
        'description',
        'image_path',
        'view_count',
        'creator_id',
    ];
}

