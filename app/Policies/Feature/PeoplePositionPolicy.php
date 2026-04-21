<?php

declare(strict_types=1);

namespace App\Policies\Feature;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Feature\PeoplePosition;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeoplePositionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PeoplePosition');
    }

    public function view(AuthUser $authUser, PeoplePosition $peoplePosition): bool
    {
        return $authUser->can('View:PeoplePosition');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PeoplePosition');
    }

    public function update(AuthUser $authUser, PeoplePosition $peoplePosition): bool
    {
        return $authUser->can('Update:PeoplePosition');
    }

    public function delete(AuthUser $authUser, PeoplePosition $peoplePosition): bool
    {
        return $authUser->can('Delete:PeoplePosition');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:PeoplePosition');
    }

    public function restore(AuthUser $authUser, PeoplePosition $peoplePosition): bool
    {
        return $authUser->can('Restore:PeoplePosition');
    }

    public function forceDelete(AuthUser $authUser, PeoplePosition $peoplePosition): bool
    {
        return $authUser->can('ForceDelete:PeoplePosition');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PeoplePosition');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PeoplePosition');
    }

    public function replicate(AuthUser $authUser, PeoplePosition $peoplePosition): bool
    {
        return $authUser->can('Replicate:PeoplePosition');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PeoplePosition');
    }

}