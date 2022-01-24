<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChowhubRating extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'description',
        'status',

    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function product()
    {
        return $this->belongsTo(ChowhubProduct::class,'product_id','id');
    }
}