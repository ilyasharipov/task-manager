<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class UserChangePasswordTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testEdit()
    {
        $response = $this->get(route('change_pass.edit', [$this->user]));
        $response->assertOk();
    }
}
