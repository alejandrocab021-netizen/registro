<?php

use Livewire\Volt\Component;

new class extends Component
{
    public function placeholder(): string
    {
        return 'Cargando registro inmediato...';
    }
};
?>

<div class="space-y-4">
    <h1 class="text-2xl font-semibold">Registro inmediato</h1>
    <p class="text-sm text-slate-600">
        El formulario paso a paso se implementará en el PR #2. Este stub confirma el routing y la integración Volt.
    </p>
</div>
