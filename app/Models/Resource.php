<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Resource extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id', 
        'slug', 
        'title', 
        'description', 
        'type', 
        'published_at', 
        'relevance_score'
    ];

    protected $casts = [
        'published_at' => 'date', 
        'relevance_score' => 'integer', 
    ];

   
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope for filtering resources by year.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $year
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByYear($query, $year)
    {
        return $query->whereYear('published_at', $year);
    }

    /**
     * Scope for sorting resources by relevance.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $direction (asc or desc)
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSortByRelevance($query, $direction = 'desc')
    {
        return $query->orderBy('relevance_score', $direction);
    }

    /**
     * Get a formatted version of the published date.
     *
     * @return string|null
     */
    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? Carbon::parse($this->published_at)->format('F j, Y') : null;
    }
}
