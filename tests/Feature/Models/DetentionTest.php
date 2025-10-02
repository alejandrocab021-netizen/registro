<?php

namespace Tests\Feature\Models;

use App\Models\Detention;
use Database\Factories\DetentionUpdateFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DetentionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_relates_person_and_updates(): void
    {
        $detention = Detention::factory()
            ->has(DetentionUpdateFactory::new(), 'updates')
            ->create();

        $this->assertNotNull($detention->person);
        $this->assertSame(1, $detention->updates()->count());
        $this->assertTrue($detention->fecha_hora_detencion->isUtc());
    }
}
