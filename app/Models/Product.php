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
        'name','sku','category','name','slug','feature_image','description','quantity','weight','price','sale_price','status','featured'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category');
    }
}
