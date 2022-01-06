<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
     'product_id',
     'variation_id',
     'transaction_id',
     'shipping_id',
     'user_id',
     'status',
     'grand_total',
      'item_count', 
      'is_paid',
      'payment_method',
      'shippingmethod',
      'remark'
     
    ];

}
