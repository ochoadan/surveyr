<?php

namespace Tests\Feature\Jobs;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class RunAlertCheckTest extends TestCase
{
    /**
     * @var \App\ScheduleMonitor
     */
    protected $monitor;

    public function setUp(): void
    {
        parent::setUp();

        $app = factory(\App\App::class)->create([
            'team_id' => $this->team->id,
        ]);
        $this->monitor = factory(\App\ScheduleMonitor::class)->create([
            'app_id'       => $app->id,
            'command'      => 'echo "Hello World!"',
            'schedule'     => '* * * * *',
            'timezone'     => 'UTC',
            'grace_period' => 3,
        ]);
        factory(\App\ScheduleMonitorEvent::class)->create([
            'schedule_monitor_id' => $this->monitor->id,
            'started_at'          => Carbon::create(2019, 1, 1, 2, 30, 0),
            'finished_at'         => Carbon::create(2019, 1, 1, 2, 30, 5),
            'duration'            => 5,
        ]);

        $emailAlert = factory(\App\Alert\EmailAlert::class)->create([
            'team_id' => $this->team->id,
        ]);
        $app->emailAlerts()->attach($emailAlert->id);
    }

    public function testPassing()
    {
        Mail::fake();

        $checkTime = Carbon::create(2019, 1, 1, 2, 31, 0);

        $job = new \App\Jobs\RunAlertCheck($this->monitor, $checkTime);
        $job->handle();

        $this->assertDatabaseHas('schedule_monitors', [
            'id'     => $this->monitor->id,
            'status' => 'passing',
        ]);

        Mail::assertNothingSent();
    }

    public function testFailing()
    {
        Mail::fake();

        $checkTime = Carbon::create(2019, 1, 1, 2, 35, 0);

        $job = new \App\Jobs\RunAlertCheck($this->monitor, $checkTime);
        $job->handle();

        $this->assertDatabaseHas('schedule_monitors', [
            'id'     => $this->monitor->id,
            'status' => 'failing',
        ]);

        Mail::assertSent(\App\Mail\ScheduleMonitorFailing::class);
    }

    public function testRecovered()
    {
        Mail::fake();

        $this->monitor->status = 'failing';
        $this->monitor->save();

        $checkTime = Carbon::create(2019, 1, 1, 2, 31, 0);

        $job = new \App\Jobs\RunAlertCheck($this->monitor, $checkTime);
        $job->handle();

        $this->assertDatabaseHas('schedule_monitors', [
            'id'     => $this->monitor->id,
            'status' => 'passing',
        ]);

        Mail::assertSent(\App\Mail\ScheduleMonitorRecovered::class);
    }

    public function testDontSendDuplicateFailingAlerts()
    {
        Mail::fake();

        // First check
        $job = new \App\Jobs\RunAlertCheck($this->monitor, Carbon::create(2019, 1, 1, 2, 35, 0));
        $job->handle();

        $this->assertDatabaseHas('schedule_monitors', [
            'id'     => $this->monitor->id,
            'status' => 'failing',
        ]);

        Mail::assertSent(\App\Mail\ScheduleMonitorFailing::class);

        // Second check
        $job = new \App\Jobs\RunAlertCheck($this->monitor, Carbon::create(2019, 1, 1, 2, 36, 0));
        $job->handle();

        $this->assertDatabaseHas('schedule_monitors', [
            'id'     => $this->monitor->id,
            'status' => 'failing',
        ]);

        Mail::assertSent(\App\Mail\ScheduleMonitorFailing::class, 1);
    }
}
