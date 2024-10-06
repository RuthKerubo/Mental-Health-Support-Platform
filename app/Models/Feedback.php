<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'resource_id',
        'user_id',
        'comment',
        'rating',
        'emotional_state',
        'found_helpful',
        'is_anonymous',
        'needs_follow_up',
        'contact_email',
        'preferred_contact_method',
        'contact_details',
        'attachments',
        'is_archived',
    ];

    protected $casts = [
        'rating' => 'integer',
        'found_helpful' => 'boolean',
        'is_anonymous' => 'boolean',
        'needs_follow_up' => 'boolean',
        'is_archived' => 'boolean',
        'attachments' => 'array',
        'followed_up_at' => 'datetime',
    ];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Handle file uploads
    public function addAttachment($file)
    {
        $path = $file->store('feedback-attachments', 'public');
        $attachments = $this->attachments ?? [];
        $attachments[] = $path;
        $this->update(['attachments' => $attachments]);
    }

    // Clean up files when feedback is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($feedback) {
            if ($feedback->attachments) {
                foreach ($feedback->attachments as $path) {
                    Storage::disk('public')->delete($path);
                }
            }
        });
    }
}