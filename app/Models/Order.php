<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'variation_id','transaction_id', 'address', 'name','zip_code','email','state','city','country','user_id','total_price','unit_price','quantity'];

}
