<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y', 
    ];

    protected $fillable = [
        'productName','type','feature_image','description','real_price','sale_price','category_id','status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }
    
    public function productGallery() {
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }
    public function productVariation() {
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }
    public function variationAttributesValue() {
        return $this->hasMany(VariationAttributeValue::class, 'product_id', 'id');
    }
  
 
}
