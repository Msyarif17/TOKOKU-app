<?php

namespace App\Console;

use App\Models\Barang;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Console\Scheduling\Schedule;
use App\Http\Controllers\TelegramBotController;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:stok')->everyThirtyMinutes();
        $schedule->command('send:penghasilan')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
