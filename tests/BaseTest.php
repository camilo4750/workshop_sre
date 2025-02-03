<?php

namespace Tests;

use App\Models\User;
use Tests\TestCase;

class BaseTest extends TestCase
{
    protected User $user;

    public function setUp():void
    {
        parent::setUp();

        $this->user = new User();
        $this->user->id = 1;
        $this->user->email = 'admin@workshop.com';
        $this->user->password = bcrypt('password');
        $this->user->active = 1;
    }

    /**
     * @test
     */
    public function isWorking()
    {
        $this->assertTrue(true);
    }


}
