<?php

namespace App\Surveyr\Helpers;

use App\ScheduleMonitor;
use Cron\CronExpression;

class CronHelper
{
    /**
     * @param ScheduleMonitor $monitor
     * @param string|\DateTimeInterface $currentTime
     * @return bool
     */
    final public static function monitorIsDue(ScheduleMonitor $monitor, $currentTime = 'now')
    {
        try {
            $cron = CronExpression::factory($monitor->schedule);
        } catch (\Exception $e) {
            return false;
        }

        return $cron->isDue($currentTime, $monitor->timezone);
    }
}
