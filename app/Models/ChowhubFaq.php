<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChowhubFaq extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'title',
        'description',
        'published',

       ];
       protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
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
