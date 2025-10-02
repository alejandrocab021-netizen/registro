<?php

namespace App\Policies;

use App\Models\User;

class CertificatePolicy
{
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return null;
    }

    public function view(User $user, mixed $certificate = null): bool
    {
        return $user->hasAnyRole(['supervisor', 'consulta_completa', 'consulta_basica']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['supervisor', 'consulta_completa']);
    }
}
