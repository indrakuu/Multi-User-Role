<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(User $user)
    {
        return $user->hasPermission('manage_users');
    }
    
    public function view(User $user)
    {
        return $user->hasPermission('manage_profile');
    }
}