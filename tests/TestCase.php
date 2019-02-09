<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    /**
     * @var \App\Team
     */
    protected $team;

    /**
     * @var \App\User
     */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(\App\User::class)->create();
        $this->team = factory(\App\Team::class)->create([
            'owner_id' => $this->user->id,
        ]);
    }
}
