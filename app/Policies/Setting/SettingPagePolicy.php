<?php

declare(strict_types=1);

namespace App\Policies\Setting;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Setting\SettingPage;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPagePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SettingPage');
    }

    public function view(AuthUser $authUser, SettingPage $settingPage): bool
    {
        return $authUser->can('View:SettingPage');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SettingPage');
    }

    public function update(AuthUser $authUser, SettingPage $settingPage): bool
    {
        return $authUser->can('Update:SettingPage');
    }

    public function delete(AuthUser $authUser, SettingPage $settingPage): bool
    {
        return $authUser->can('Delete:SettingPage');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SettingPage');
    }

    public function restore(AuthUser $authUser, SettingPage $settingPage): bool
    {
        return $authUser->can('Restore:SettingPage');
    }

    public function forceDelete(AuthUser $authUser, SettingPage $settingPage): bool
    {
        return $authUser->can('ForceDelete:SettingPage');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SettingPage');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SettingPage');
    }

    public function replicate(AuthUser $authUser, SettingPage $settingPage): bool
    {
        return $authUser->can('Replicate:SettingPage');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SettingPage');
    }

}