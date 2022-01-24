<?php

namespace App\Policies;

use App\Models\Membre;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class membrepolicy
{
    use HandlesAuthorization;

public function before($user, $ability){
    if($user->is_admin){
        return true;
    }
}




    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membre  $membre
     * @return mixed
     */
    public function view(User $user, Membre $membre)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membre  $membre
     * @return mixed
     */
    public function update(User $user, Membre $membre)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membre  $membre
     * @return mixed
     */
    public function delete(User $user, Membre $membre)
    {
      
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membre  $membre
     * @return mixed
     */
    public function restore(User $user, Membre $membre)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membre  $membre
     * @return mixed
     */
    public function forceDelete(User $user, Membre $membre)
    {
        //
    }
}
