<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y', 
    ];

    protected $fillable = [
        'name', 'slug', 'parent_id','feature_image'
    ];
    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y h:i:s',strtotime($value));
    }
}