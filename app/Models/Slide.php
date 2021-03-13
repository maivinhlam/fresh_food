<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link', 'image', 'creator_id',
    ];

    public function creator()
    {
        return $this->belongsTo(Admin::class);
    }
}
