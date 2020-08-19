<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        $response = $this->get(route('dashboard'));
        $response->assertOk();
    }
}
