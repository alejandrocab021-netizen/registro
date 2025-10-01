<?php

namespace App\Policies;

use App\Models\DetentionUpdate;
use App\Models\User;

class DetentionUpdatePolicy
{
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return null;
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['supervisor', 'capturista', 'enlace']);
    }

    public function update(User $user, DetentionUpdate $update): bool
    {
        return $user->hasAnyRole(['supervisor', 'enlace']);
    }

    public function view(User $user, DetentionUpdate $update): bool
    {
        return $user->hasAnyRole(['supervisor', 'consulta_completa', 'capturista', 'enlace']);
    }
}
