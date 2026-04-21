<?php

declare(strict_types=1);

namespace App\Policies\Feature;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Feature\ContacUs;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContacUsPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ContacUs');
    }

    public function view(AuthUser $authUser, ContacUs $contacUs): bool
    {
        return $authUser->can('View:ContacUs');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ContacUs');
    }

    public function update(AuthUser $authUser, ContacUs $contacUs): bool
    {
        return $authUser->can('Update:ContacUs');
    }

    public function delete(AuthUser $authUser, ContacUs $contacUs): bool
    {
        return $authUser->can('Delete:ContacUs');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:ContacUs');
    }

    public function restore(AuthUser $authUser, ContacUs $contacUs): bool
    {
        return $authUser->can('Restore:ContacUs');
    }

    public function forceDelete(AuthUser $authUser, ContacUs $contacUs): bool
    {
        return $authUser->can('ForceDelete:ContacUs');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ContacUs');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ContacUs');
    }

    public function replicate(AuthUser $authUser, ContacUs $contacUs): bool
    {
        return $authUser->can('Replicate:ContacUs');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ContacUs');
    }

}