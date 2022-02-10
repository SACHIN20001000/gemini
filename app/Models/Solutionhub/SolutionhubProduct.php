<?php

namespace App\Models\Solutionhub;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionhubProduct extends Model
{

    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:M d, Y h:i:s',
        'updated_at' => 'datetime:M d, Y h:i:s',
    ];
    protected $fillable = [
        'productName', 'description', 'tag', 'feature_image', 'status',  'separation_anxiety','teething','boredom','disabled','energetic'
    ];
    public function tags()
    {

        return $this->hasMany(SolutionhubProductTag::class, 'product_id', 'id');
    }
}
