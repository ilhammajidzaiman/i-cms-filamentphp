<?php

declare(strict_types=1);

namespace App\Policies\Setting;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Setting\NavigationFooter;
use Illuminate\Auth\Access\HandlesAuthorization;

class NavigationFooterPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:NavigationFooter');
    }

    public function view(AuthUser $authUser, NavigationFooter $navigationFooter): bool
    {
        return $authUser->can('View:NavigationFooter');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:NavigationFooter');
    }

    public function update(AuthUser $authUser, NavigationFooter $navigationFooter): bool
    {
        return $authUser->can('Update:NavigationFooter');
    }

    public function delete(AuthUser $authUser, NavigationFooter $navigationFooter): bool
    {
        return $authUser->can('Delete:NavigationFooter');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:NavigationFooter');
    }

    public function restore(AuthUser $authUser, NavigationFooter $navigationFooter): bool
    {
        return $authUser->can('Restore:NavigationFooter');
    }

    public function forceDelete(AuthUser $authUser, NavigationFooter $navigationFooter): bool
    {
        return $authUser->can('ForceDelete:NavigationFooter');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:NavigationFooter');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:NavigationFooter');
    }

    public function replicate(AuthUser $authUser, NavigationFooter $navigationFooter): bool
    {
        return $authUser->can('Replicate:NavigationFooter');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:NavigationFooter');
    }

}