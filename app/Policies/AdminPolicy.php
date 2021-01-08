<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any admins.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function view(Admin $admin, Admin $admin2)
    {
        return ($admin->role_id < $admin2->role_id || $admin->id == $admin2->id);
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return ($admin->role_id <= 2);
    }

    public function store(Admin $admin, Admin $admin2)
    {
        return ($admin->role_id < $admin2->role_id);
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function update(Admin $admin, Admin $admin2)
    {
        return ($admin->role_id < $admin2->role_id || $admin->id == $admin2->id);
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function delete(Admin $admin, Admin $admin2)
    {
        return ($admin->role_id < $admin2->role_id );
    }

    /**
     * Determine whether the user can restore the admin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function restore(Admin $admin, Admin $admin2)
    {
        return ($admin->role_id < $admin2->role_id);
    }

    /**
     * Determine whether the user can permanently delete the admin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function forceDelete(Admin $admin, Admin $admin2)
    {
        return ($admin->role_id < $admin2->role_id);
    }
}
