<?php

namespace Tests\Feature;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        $response = $this->get(route('users.index'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $response = $this->get(route('users.edit', [$this->user]));
        $response->assertOk();
    }

    public function testUpdate()
    {
        $factoryData = factory(User::class)->make()->toArray();
        $data = Arr::only($factoryData, [
            'nickname',
            'name',
            'lastName',
            'gender',
            'birthday',
            'email',
        ]);
        $response = $this->patch(route('users.update', $this->user), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('users', $data);
    }
}
