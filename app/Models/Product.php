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
        'supplier_id',
        'name',
        'price',
        'sell_percen',
        'amount',
        'description',
        'image_path',
        'view_count',
        'creator_id',
    ];

    public function creator()
    {
        return $this->belongsTo(Admin::class);
    }


    public function slide()
    {
        return $this->belongsTo(Slide::class);
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function articles()
    {
        return $this->hasOne(Articles::class);
    }
}
