<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name', 'description', 'image_path', 'product_count', 'creator_id',
    ];
}
