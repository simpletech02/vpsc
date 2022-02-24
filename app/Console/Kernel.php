<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

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
        $schedule->command('exchange-rate:cron')->weeklyOn(1, '7:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        Artisan::command('user:create', function () {
            $name = $this->ask('Name?');
            $email = $this->ask('Email?');
            $pwd = $this->secret('Password?');

            User::query()
                ->create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($pwd),
                ]);

            $this->info('Account created for '.$name);
        });

        require base_path('routes/console.php');
    }
}
