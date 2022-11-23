<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $hidden = ['pivot'];

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
