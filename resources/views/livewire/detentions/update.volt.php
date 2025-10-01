<?php

use Livewire\Volt\Component;

new class extends Component
{
    public string $nrd;

    public function mount(string $nrd): void
    {
        $this->nrd = $nrd;
    }

    public function placeholder(): string
    {
        return 'Cargando actualización...';
    }
};
?>

<div class="space-y-4">
    <h1 class="text-2xl font-semibold">Actualización del registro</h1>
    <p class="text-sm text-slate-600">
        La lógica de recuperación por NRD y validaciones de plazo se incorporarán en el PR #4. Este stub mantiene la ruta activa para el NRD <span class="font-mono text-slate-800">{{ $nrd }}</span>.
    </p>
</div>
