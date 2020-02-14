<?php

namespace Tests\Unit;

use App\Surveyr\Helpers\CronHelper;
use Carbon\Carbon;
use Tests\TestCase;

class CronHelperTest extends TestCase
{
    public function testMonitorIsDue()
    {
        $app     = factory(\App\App::class)->create([
            'team_id' => $this->team->id,
        ]);
        $monitor = factory(\App\ScheduleMonitor::class)->create([
            'app_id'   => $app->id,
            'schedule' => '0 0 * * *', // 00:00 every day
            'timezone' => 'America/New_York', // UTC -5
        ]);

        $checkTime = Carbon::create(2019, 1, 10, 0, 0, 0); // UTC
        $this->assertFalse(CronHelper::monitorIsDue($monitor, $checkTime));

        $checkTime = Carbon::create(2019, 1, 10, 5, 0, 0); // UTC
        $this->assertTrue(CronHelper::monitorIsDue($monitor, $checkTime));
    }
}
