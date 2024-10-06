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
        'user_id',
        'title', 
        'description', 
        'type', 
        'published_at', 
        'relevance_score',
        'image_path',
        'file_path',
        'external_link'
    ];

    protected $casts = [
        'published_at' => 'date', 
        'relevance_score' => 'integer', 
    ];

   
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
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

    /**
     * Get the full URL for the image.
     *
     * @return string|null
     */
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    /**
     * Get the full URL for the file.
     *
     * @return string|null
     */
    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }
}
