<?php

namespace App\Models\LitterHub;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LitterhubProductTag extends Model
{

    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];
    protected $fillable = [
        'product_id', 'tag_id'
    ];

    public function tagName()
    {
        return $this->belongsTo(LitterHubTag::class, 'tag_id');
    }

}
