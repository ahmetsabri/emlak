<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\RealEstate;
use App\Models\User;

class RealEstatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any RealEstate');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RealEstate $realestate): bool
    {
        return $user->checkPermissionTo('view RealEstate');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create RealEstate');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RealEstate $realestate): bool
    {
        return $user->checkPermissionTo('update RealEstate');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RealEstate $realestate): bool
    {
        return $user->checkPermissionTo('delete RealEstate');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('{{ deleteAnyPermission }}');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RealEstate $realestate): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('{{ restoreAnyPermission }}');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, RealEstate $realestate): bool
    {
        return $user->checkPermissionTo('replicate RealEstate');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('{{ reorderPermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RealEstate $realestate): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('{{ forceDeleteAnyPermission }}');
    }
}
