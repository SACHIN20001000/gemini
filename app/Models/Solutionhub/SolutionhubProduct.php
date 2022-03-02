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
        'productName', 'description', 'tag', 'feature_image', 'status',  'separation_anxiety','teething','boredom','disabled','energetic','aggressive_chewers'
    ];
    protected $appends = array('availTags','availBackendTags','availBrands');
    public function backendtags()
    {

        return $this->hasMany(SolutionhubProductBackendTag::class, 'product_id', 'id');
    }
    public function tags()
    {

        return $this->hasMany(SolutionhubProductTag::class, 'product_id', 'id');
    }
    public function brands()
    {

        return $this->hasMany(SolutionhubProductBrand::class, 'product_id', 'id');
    }
    public function getAvailTagsAttribute()
    {
        $tags = $this->tags;
        $tagsData = [];
        foreach ($tags as $key => $tag)
        {
            $tagName = $tag->tagName;
            array_push($tagsData, $tagName->name);
        }
        $tagsData = implode(',', $tagsData);
        return $tagsData;
    }
    public function getAvailBackendTagsAttribute()
    {
        $tags = $this->backendtags;
        $tagsData = [];
        foreach ($tags as $key => $tag)
        {
            $tagName = $tag->tagName;
            array_push($tagsData, $tagName->name);
        }
        $tagsData = implode(',', $tagsData);
        return $tagsData;
    }
    public function getAvailBrandsAttribute()
    {
        $tags = $this->brands;
        $tagsData = [];
        foreach ($tags as $key => $tag)
        {
            $tagName = $tag->brandName;
            array_push($tagsData, $tagName->name);
        }
        $tagsData = implode(',', $tagsData);
        return $tagsData;
    }
}
