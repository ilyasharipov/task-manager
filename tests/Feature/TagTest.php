<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class TagTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        $response = $this->get(route('tags.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('tags.create'));
        $response->assertOk();
    }
}