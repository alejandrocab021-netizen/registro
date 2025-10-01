<?php

use App\Services\AuditService;

if (! function_exists('audit')) {
    function audit(string $action, string $modelType, int|string $modelId, ?array $changes = null, array $meta = []): \App\Models\AuditLog
    {
        return app(AuditService::class)->log($action, $modelType, $modelId, $changes, $meta);
    }
}
