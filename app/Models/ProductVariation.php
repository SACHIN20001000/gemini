<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y', 
    ];

    protected $fillable = [
        'product_id','real_price','sale_price','image','variation_name','sku_id','variation_ids'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function productSku()
    {
        return $this->belongsTo(ProductSku::class,'sku_id');
    }
}
