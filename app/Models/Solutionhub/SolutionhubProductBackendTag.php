<?php

namespace App\Models\Solutionhub;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionhubProductBackendTag extends Model
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
        return $this->belongsTo(SolutionhubBackendTag::class, 'tag_id');
    }

}