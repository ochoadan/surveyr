<?php

namespace App\Console\Commands;

use App\Mail\TrialIsAlmostOver;
use App\Mail\TrialIsOver;
use App\Team;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTrialReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-trial-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send trial reminders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $count = 0;

        $this->info('Sending trial reminders...');

        Team::chunk(10, function($teams) use (&$count) {
            foreach ($teams as $team) {
                if ($team->subscribed()) {
                    continue;
                }
                if (empty($team->trial_ends_at)) {
                    continue;
                }

                if ($team->trial_ends_at->diffInDays(now()) === 3) {
                    Mail::to($team->owner->email)->send(new TrialIsAlmostOver($team));
                    $count++;
                }
                if ($team->trial_ends_at->diffInDays(now()) === 0) {
                    Mail::to($team->owner->email)->send(new TrialIsOver($team));
                    $count++;
                }
            }
        });

        $this->info($count . ' reminders sent');
    }
}
