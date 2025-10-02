<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditService
{
    public function log(string $action, string $modelType, int|string $modelId, ?array $changes = null, array $meta = []): AuditLog
    {
        $request = app()->bound('request') ? app(Request::class) : null;
        $user = Auth::user();

        $payload = [
            'action' => $action,
            'model_type' => $modelType,
            'model_id' => $modelId,
            'changes' => $changes,
            'ip' => $meta['ip'] ?? $request?->ip(),
            'user_agent' => $meta['user_agent'] ?? $request?->userAgent(),
        ];

        if ($user instanceof Authenticatable) {
            $payload['user_id'] = $user->getAuthIdentifier();
        }

        if (isset($meta['user_id'])) {
            $payload['user_id'] = $meta['user_id'];
        }

        if ($request && ! isset($payload['user_id']) && $request->user()) {
            $payload['user_id'] = $request->user()->getAuthIdentifier();
        }

        $payload = array_filter($payload, static fn ($value) => ! is_null($value));

        return AuditLog::create($payload);
    }
}
