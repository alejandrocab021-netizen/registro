<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuditTrail
{
    public function handle(Request $request, Closure $next, ?string $action = null)
    {
        $response = $next($request);

        $context = $request->attributes->get('audit_context');

        if ($context && isset($context['model_type'], $context['model_id'])) {
            audit(
                $action ?? ($context['action'] ?? 'viewed'),
                $context['model_type'],
                $context['model_id'],
                $context['changes'] ?? null,
                [
                    'ip' => $context['ip'] ?? $request->ip(),
                    'user_agent' => $context['user_agent'] ?? $request->userAgent(),
                ]
            );
        }

        return $response;
    }
}
