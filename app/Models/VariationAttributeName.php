<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationAttributeName extends Model
{
    protected $table = 'variations_attributes_names';
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y', 
    ];

    protected $fillable = [
        'attribute_id','name'
    ];
    public function variationAttributeName()
    {
        return $this->belongsTo(VariationAttributeName::class,'attribute_id' );
    }
   

}
