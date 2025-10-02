<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class IssueCertificateCommand extends Command
{
    protected $signature = 'rdn:issue-certificate {reference}';

    protected $description = 'Emitir certificado digital (mock TSA) para una detención o consulta pública';

    public function handle(): int
    {
        $reference = $this->argument('reference');

        $this->comment("Certificate generation queued for {$reference} (stub).");

        return self::SUCCESS;
    }
}
