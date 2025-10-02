<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemindDeadlinesCommand extends Command
{
    protected $signature = 'rdn:remind-deadlines';

    protected $description = 'Enviar alertas T-60 y T-15 minutos para plazos críticos';

    public function handle(): int
    {
        $this->comment('Reminder job dispatched (stub).');

        return self::SUCCESS;
    }
}
