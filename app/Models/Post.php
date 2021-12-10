<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'content','created_by','category','slug','status'
    ]; 

    public function users()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class,'category');
    }
}
