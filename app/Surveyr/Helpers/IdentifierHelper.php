<?php

namespace App\Surveyr\Helpers;

use App\App;
use App\ScheduleMonitor;

class IdentifierHelper
{
    /**
     * @param string|null $key
     * @return string
     */
    final public static function getIdentifier($key = null)
    {
        if (!$key) {
            $key = microtime();
        }

        return sha1($key);
    }

    /**
     * @param App $app
     * @return string
     */
    final public static function appIdentifier(App $app)
    {
        return self::getIdentifier();
    }

    /**
     * @param ScheduleMonitor $monitor
     * @return string
     */
    final public static function scheduleMonitorIdentifier(ScheduleMonitor $monitor)
    {
        return self::getIdentifier($monitor->command . $monitor->schedule . $monitor->timezone);
    }
}
