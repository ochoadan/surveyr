<?php

return [
    'plans' => [

        // Archived Plans

        'surveyr-solo-14-monthly'     => [
            'id'                     => 'surveyr-solo-14-monthly',
            'title'                  => 'Solo',
            'price'                  => 14,
            'trial'                  => 10,
            'interval'               => 'monthly',
            'archived'               => true,
            'schedule_monitor_limit' => 10,
            'team_member_limit'      => 1,
        ],
        'surveyr-startup-39-monthly'  => [
            'id'                     => 'surveyr-startup-39-monthly',
            'title'                  => 'Startup',
            'price'                  => 39,
            'trial'                  => 10,
            'interval'               => 'monthly',
            'archived'               => true,
            'schedule_monitor_limit' => 30,
            'team_member_limit'      => 5,
        ],
        'surveyr-solo-9-monthly'      => [
            'id'                     => 'surveyr-solo-9-monthly',
            'title'                  => 'Solo',
            'price'                  => 9,
            'trial'                  => 10,
            'interval'               => 'monthly',
            'archived'               => true,
            'schedule_monitor_limit' => 5,
            'team_member_limit'      => 1,
        ],

        // Active Plans

        'surveyr-solo-5-monthly'      => [
            'id'                     => 'price_1NGiEKFIrRBnyYm2DdgV3XwU',
            'title'                  => 'Solo',
            'price'                  => 5,
            'trial'                  => 10,
            'interval'               => 'monthly',
            'archived'               => false,
            'schedule_monitor_limit' => 5,
            'team_member_limit'      => 1,
        ],
        'surveyr-startup-29-monthly'  => [
            'id'                     => 'price_1NGiDfFIrRBnyYm2UgQcoOYY',
            'title'                  => 'Startup',
            'price'                  => 29,
            'trial'                  => 10,
            'interval'               => 'monthly',
            'archived'               => false,
            'schedule_monitor_limit' => 30,
            'team_member_limit'      => 5,
        ],
        'surveyr-business-99-monthly' => [
            'id'                     => 'price_1NGi8NFIrRBnyYm2O0PW5TrI',
            'title'                  => 'Business',
            'price'                  => 99,
            'trial'                  => 10,
            'interval'               => 'monthly',
            'archived'               => false,
            'schedule_monitor_limit' => 200,
            'team_member_limit'      => null,
        ],
    ],
];
