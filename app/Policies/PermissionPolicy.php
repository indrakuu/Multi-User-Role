<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    protected $user;

    public function viewAny(User $user)
    {
        return $user->hasPermission('manage_users');
    }

    public function view(User $user)
    {
        return $user->hasPermission('manage_users');
    }

    public function create(User $user)
    {
        return $user->hasPermission('manage_users');
    }

    public function update(User $user, Permission $permission)
    {
        return $user->hasPermission('manage_users');
    }

    public function delete(User $user, Permission $permission)
    {
        return $user->hasPermission('manage_users');
    }

    public function restore(User $user, Permission $permission)
    {
        return $user->hasPermission('manage_users');
    }

    public function forceDelete(User $user, Permission $permission)
    {
        return $user->hasPermission('manage_users');
    }
}