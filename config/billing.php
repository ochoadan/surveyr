<?php

return [
    'plans' => [
        'free' => [
            'id'                     => 'free',
            'title'                  => 'Free',
            'price'                  => 0,
            'interval'               => 'monthly',
            'archived'               => false,
            'app_limit'              => 1,
            'schedule_monitor_limit' => 1,
            'team_member_limit'      => 1,
        ],
        'surveyr-solo-14-monthly' => [
            'id'                     => 'surveyr-solo-14-monthly',
            'title'                  => 'Solo',
            'price'                  => 14,
            'interval'               => 'monthly',
            'archived'               => false,
            'app_limit'              => 1,
            'schedule_monitor_limit' => 10,
            'team_member_limit'      => 1,
        ],
        'surveyr-startup-39-monthly' => [
            'id'                     => 'surveyr-startup-39-monthly',
            'title'                  => 'Startup',
            'price'                  => 39,
            'interval'               => 'monthly',
            'archived'               => false,
            'app_limit'              => 3,
            'schedule_monitor_limit' => 30,
            'team_member_limit'      => 3,
        ],
        'surveyr-business-99-monthly' => [
            'id'                     => 'surveyr-business-99-monthly',
            'title'                  => 'Business',
            'price'                  => 99,
            'interval'               => 'monthly',
            'archived'               => false,
            'app_limit'              => 10,
            'schedule_monitor_limit' => 100,
            'team_member_limit'      => 10,
        ],
    ],
];
