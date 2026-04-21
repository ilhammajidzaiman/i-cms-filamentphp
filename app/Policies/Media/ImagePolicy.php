<?php

declare(strict_types=1);

namespace App\Policies\Media;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Media\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Image');
    }

    public function view(AuthUser $authUser, Image $image): bool
    {
        return $authUser->can('View:Image');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Image');
    }

    public function update(AuthUser $authUser, Image $image): bool
    {
        return $authUser->can('Update:Image');
    }

    public function delete(AuthUser $authUser, Image $image): bool
    {
        return $authUser->can('Delete:Image');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Image');
    }

    public function restore(AuthUser $authUser, Image $image): bool
    {
        return $authUser->can('Restore:Image');
    }

    public function forceDelete(AuthUser $authUser, Image $image): bool
    {
        return $authUser->can('ForceDelete:Image');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Image');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Image');
    }

    public function replicate(AuthUser $authUser, Image $image): bool
    {
        return $authUser->can('Replicate:Image');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Image');
    }

}