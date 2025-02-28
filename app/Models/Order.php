<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class Order extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];

    public function product()
    {
        return  $this->belongsTo(Product::class);
    }
}
