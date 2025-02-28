<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class Operator extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];

    public function recharges()
    {
        return $this->hasMany(Recharge::class);
    }
}
