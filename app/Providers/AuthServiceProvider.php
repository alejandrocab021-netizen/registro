<?php

namespace App\Providers;

use App\Models\AuditLog;
use App\Models\Detention;
use App\Models\DetentionUpdate;
use App\Policies\AuditPolicy;
use App\Policies\CertificatePolicy;
use App\Policies\DetentionPolicy;
use App\Policies\DetentionUpdatePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Detention::class => DetentionPolicy::class,
        DetentionUpdate::class => DetentionUpdatePolicy::class,
        AuditLog::class => AuditPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('certificate.manage', [CertificatePolicy::class, 'create']);
        Gate::define('certificate.view', [CertificatePolicy::class, 'view']);

        Gate::before(function ($user, $ability) {
            return $user?->hasRole('admin') ? true : null;
        });
    }
}
