<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    // si algun user puede ver algun modelo
    public function viewAny(User $user)
    {
        //
    }

    // determina que usuario puede ver cuales modelos
    public function view(User $user, User $model)
    {
        //
    }

    //que usuario puede crear modelos
    public function create(User $user)
    {
        //
    }

    //que usuario pued actualizar modelos
    public function update(User $user, User $model)
    {
        //
    }

    // que usuarios puede eliminar modelos
    public function delete(User $user, User $model)
    {
        //
    }

    //que usuarios puede restaurar modelos
    public function restore(User $user, User $model)
    {
        //
    }

    // que usuarios puede borrar permanentemente usuarios
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
