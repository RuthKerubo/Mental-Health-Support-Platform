<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Resource extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['category_id', 'title', 'description', 'published_at', 'relevance_score'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
