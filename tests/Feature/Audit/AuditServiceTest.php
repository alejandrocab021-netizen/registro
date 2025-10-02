<?php

namespace Tests\Feature\Audit;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuditServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_audit_helper_persists_log(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $log = audit('created', 'App\\Models\\Detention', 123, ['foo' => 'bar']);

        $this->assertInstanceOf(AuditLog::class, $log);
        $this->assertDatabaseHas('audit_logs', [
            'id' => $log->id,
            'action' => 'created',
            'model_type' => 'App\\Models\\Detention',
            'model_id' => 123,
        ]);
    }
}
