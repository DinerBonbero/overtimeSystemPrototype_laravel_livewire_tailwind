<?php

namespace App\Policies;

use App\Models\OvertimeSheet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OvertimeSheetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool //indexで使用
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, OvertimeSheet $overtimeSheet): bool //showで使用
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool //createで使用
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, OvertimeSheet $overtimeSheet): bool //editで使用
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, OvertimeSheet $overtimeSheet): bool //destroyで使用
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, OvertimeSheet $overtimeSheet): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, OvertimeSheet $overtimeSheet): bool
    {
        return false;
    }
}
