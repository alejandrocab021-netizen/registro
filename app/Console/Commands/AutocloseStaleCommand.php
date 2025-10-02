<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutocloseStaleCommand extends Command
{
    protected $signature = 'rdn:autoclose-stale';

    protected $description = 'Cerrar registros de detención sin actividad en más de 6 días';

    public function handle(): int
    {
        $this->comment('Auto close process executed (stub).');

        return self::SUCCESS;
    }
}
