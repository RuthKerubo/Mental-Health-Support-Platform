<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedbackPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Feedback $feedback): bool
    {
        return $user->hasRole('admin') || $user->id === $feedback->user_id;
    }

    public function create(User $user): bool
    {
        return true; // Allow all authenticated users to create feedback
    }

    public function update(User $user, Feedback $feedback): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Feedback $feedback): bool
    {
        return $user->hasRole('admin');
    }

    // Add any other methods as needed
}