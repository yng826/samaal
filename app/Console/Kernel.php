<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        Log::debug('schedule');
        // $schedule->command('inspire')
        //       ->everyMinute()
        //       ->appendOutputTo('C:\web\samaal\test.txt');
        $schedule->call(function() {
            // 오픈
            $affected = DB::table('recruits')
            ->where([
                ['start_date', '>=', date('Y-m-d')],
                ['recruit_status', '=', 'standby'],
            ])
            ->update(['recruit_status'=> 'open']);

            /*
            // 종료
            $end_recruits = DB::table('recruits')
                ->where([
                    ['end_date', '<=', date('Y-m-d')],
                    ['recruit_status', '<>', 'closed'],
                ])
                ->get();
            Log::debug(json_encode($end_recruits->pluck('id')));
            $recruit_ids = $end_recruits->pluck('id');
            if (count($recruit_ids)) {
                // $end_recruits = DB::update(DB::raw("UPDATE job_applications
                //     SET status = (CASE WHEN status = 'submit' then 'pending'
                //         WHEN status = 'saved' then 'expired' END)
                //     WHERE recruit_id IN ()"));
                DB::table('job_applications')
                    ->whereIn('recruit_id', $recruit_ids->all())
                    ->update(['status' => DB::raw("(CASE WHEN status = 'submit' then 'pending'
                        WHEN status = 'saved' then 'expired' END)")]);
                $affected = DB::table('recruits')
                    ->where([
                        ['end_date', '<=', date('Y-m-d')],
                        ['recruit_status', '<>', 'closed'],
                    ])
                    ->update(['recruit_status'=> 'closed']);
            }
            // $query = DB::getQueryLog();
            // Log::debug($end_recruits->pluck('id'));
            */
        })->everyMinute();
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
