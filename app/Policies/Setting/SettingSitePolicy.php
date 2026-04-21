<?php

declare(strict_types=1);

namespace App\Policies\Setting;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Setting\SettingSite;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingSitePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SettingSite');
    }

    public function view(AuthUser $authUser, SettingSite $settingSite): bool
    {
        return $authUser->can('View:SettingSite');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SettingSite');
    }

    public function update(AuthUser $authUser, SettingSite $settingSite): bool
    {
        return $authUser->can('Update:SettingSite');
    }

    public function delete(AuthUser $authUser, SettingSite $settingSite): bool
    {
        return $authUser->can('Delete:SettingSite');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SettingSite');
    }

    public function restore(AuthUser $authUser, SettingSite $settingSite): bool
    {
        return $authUser->can('Restore:SettingSite');
    }

    public function forceDelete(AuthUser $authUser, SettingSite $settingSite): bool
    {
        return $authUser->can('ForceDelete:SettingSite');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SettingSite');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SettingSite');
    }

    public function replicate(AuthUser $authUser, SettingSite $settingSite): bool
    {
        return $authUser->can('Replicate:SettingSite');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SettingSite');
    }

}