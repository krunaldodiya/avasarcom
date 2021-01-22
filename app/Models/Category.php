<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class Category extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];

    public function products()
    {
        return  $this->hasMany(Product::class);
    }
}
