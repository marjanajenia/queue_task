<?php

namespace App\Console\Commands;

use App\Jobs\SendInactiveUserReminder;
use App\Models\User;
use Illuminate\Console\Command;

class SendInactiveUserReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:send-inactive-user-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder to inactive user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sevenDaysAgo = now() -> subDays(3);

        $users = User::whereNotNull('last_login_at')
        ->where('last_login_at', '<=', $sevenDaysAgo)
        ->whereDoesntHave('reminders', function ($q){
            $q->where('sent_on', now()->toDateString());
        })
        ->get();
        foreach ($users as $user) {
            SendInactiveUserReminder::dispatch($user);
        }

        $this->info('Inactive user reminders dispatched.');
    }
}
