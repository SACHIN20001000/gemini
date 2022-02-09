<?php

namespace App\Models\LitterHub;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LitterhubVariationAttributeValue extends Model
{

    protected $table = 'litterhub_variations_attributes_values';

    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];
    protected $fillable = [
        'attribute_id', 'product_id', 'name'
    ];

    public function variationAttributeName()
    {
        return $this->belongsTo(LitterHubVariationAttribute::class, 'attribute_id');
    }

}
