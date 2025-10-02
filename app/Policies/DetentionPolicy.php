<?php

namespace App\Policies;

use App\Models\Detention;
use App\Models\User;

class DetentionPolicy
{
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['supervisor', 'consulta_completa', 'consulta_basica', 'capturista', 'enlace']);
    }

    public function view(User $user, Detention $detention): bool
    {
        return $this->viewAny($user);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['capturista', 'supervisor']);
    }

    public function update(User $user, Detention $detention): bool
    {
        return $user->hasAnyRole(['capturista', 'supervisor']);
    }
}
