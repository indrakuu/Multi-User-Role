<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasPermission('view_posts');
    }

    public function view(User $user)
    {
        return $user->hasPermission('manage_posts');
    }

    public function create(User $user)
    {
        return $user->hasPermission('manage_posts');
    }

    public function update(User $user, Post $post)
    {
        return $user->hasPermission('manage_posts');
    }

    public function delete(User $user, Post $post)
    {
        return $user->hasPermission('manage_posts');
    }

    public function restore(User $user, Post $post)
    {
        return $user->hasPermission('manage_posts');
    }

    public function forceDelete(User $user, Post $post)
    {
        return $user->hasPermission('manage_posts');
    }
}