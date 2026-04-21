<?php

declare(strict_types=1);

namespace App\Policies\Media;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Media\Carousel;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarouselPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Carousel');
    }

    public function view(AuthUser $authUser, Carousel $carousel): bool
    {
        return $authUser->can('View:Carousel');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Carousel');
    }

    public function update(AuthUser $authUser, Carousel $carousel): bool
    {
        return $authUser->can('Update:Carousel');
    }

    public function delete(AuthUser $authUser, Carousel $carousel): bool
    {
        return $authUser->can('Delete:Carousel');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Carousel');
    }

    public function restore(AuthUser $authUser, Carousel $carousel): bool
    {
        return $authUser->can('Restore:Carousel');
    }

    public function forceDelete(AuthUser $authUser, Carousel $carousel): bool
    {
        return $authUser->can('ForceDelete:Carousel');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Carousel');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Carousel');
    }

    public function replicate(AuthUser $authUser, Carousel $carousel): bool
    {
        return $authUser->can('Replicate:Carousel');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Carousel');
    }

}