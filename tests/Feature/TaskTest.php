<?php

namespace Tests\Feature;

use App\User;
use App\Task;
use App\TaskStatus;
use Illuminate\Support\Arr;
use Tests\TestCase;

class TaskTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        factory(User::class)->create();
        factory(TaskStatus::class, 4)->create();
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $task = factory(Task::class)->create();
        $response = $this->get(route('tasks.edit', [$task]));
        $response->assertOk();
    }

    public function testStore()
    {
        $factoryData = factory(Task::class)->make()->toArray();
        $data = Arr::only($factoryData, [
            'name',
            'description',
            'status_id',
            'creator_id',
            'assigned_to_id',
        ]);
        $response = $this->post(route('tasks.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testUpdate()
    {
        $task = factory(Task::class)->create();
        $factoryData = factory(Task::class)->make()->toArray();
        $data = Arr::only($factoryData, [
            'name',
            'description',
            'status_id',
            'creator_id',
            'assigned_to_id',
        ]);
        $response = $this->patch(route('tasks.update', $task), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testDestroy()
    {
        $task = factory(Task::class)->create();
        $response = $this->delete(route('tasks.destroy', [$task]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
