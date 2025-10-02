<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('rdn:remind-deadlines')->everyMinute();
        $schedule->command('rdn:autoclose-stale')->dailyAt('01:00');
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}
