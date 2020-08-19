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

//    public function testUpdate()
//    {
//        factory(User::class)->create();
//        $task = factory(Task::class)->create();
//        $factoryData = factory(Task::class)->make()->toArray();
//        $data = Arr::only($factoryData, [
//            'name',
//            'description',
//            'status_id',
//            'creator_id',
//            'assigned_to_id',
//        ]);
//        $response = $this->patch(route('tasks.update', $task), $data);
//        $response->assertSessionHasNoErrors();
//        $response->assertRedirect();
//
//        $this->assertDatabaseHas('tasks', $data);
//    }
}
