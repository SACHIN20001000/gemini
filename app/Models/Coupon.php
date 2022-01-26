<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    use HasFactory;
  
    protected $fillable = [
        'name', 'code', 'category_id', 'product_id', 'type', 'apply_to', 'apply_for', 'value', 'count', 'expired_at', 'product_type'
    ];
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];

}
