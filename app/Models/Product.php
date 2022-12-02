<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function scopeActiveProducts($query)
    {
        return $query->where('active', true);
    }
}
