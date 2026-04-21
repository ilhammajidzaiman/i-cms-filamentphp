<?php

declare(strict_types=1);

namespace App\Policies\Setting;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Setting\SettingSosmed;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingSosmedPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SettingSosmed');
    }

    public function view(AuthUser $authUser, SettingSosmed $settingSosmed): bool
    {
        return $authUser->can('View:SettingSosmed');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SettingSosmed');
    }

    public function update(AuthUser $authUser, SettingSosmed $settingSosmed): bool
    {
        return $authUser->can('Update:SettingSosmed');
    }

    public function delete(AuthUser $authUser, SettingSosmed $settingSosmed): bool
    {
        return $authUser->can('Delete:SettingSosmed');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SettingSosmed');
    }

    public function restore(AuthUser $authUser, SettingSosmed $settingSosmed): bool
    {
        return $authUser->can('Restore:SettingSosmed');
    }

    public function forceDelete(AuthUser $authUser, SettingSosmed $settingSosmed): bool
    {
        return $authUser->can('ForceDelete:SettingSosmed');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SettingSosmed');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SettingSosmed');
    }

    public function replicate(AuthUser $authUser, SettingSosmed $settingSosmed): bool
    {
        return $authUser->can('Replicate:SettingSosmed');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SettingSosmed');
    }

}