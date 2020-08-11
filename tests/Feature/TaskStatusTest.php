<?php

namespace Tests\Feature;

use Illuminate\Support\Arr;
use App\User;
use App\TaskStatus;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->make();
        $this->actingAs($this->user);
        factory(TaskStatus::class)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('taskstatuses.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('taskstatuses.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $taskStatus = factory(TaskStatus::class)->create();
        $response = $this->get(route('taskstatuses.edit', [$taskStatus]));
        $response->assertOk();
    }

    public function testStore()
    {
        $factoryData = factory(TaskStatus::class)->make()->toArray();
        $data = Arr::only($factoryData, ['name']);
        $response = $this->post(route('taskstatuses.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdate()
    {
        $taskStatus = factory(TaskStatus::class)->create();
        $factoryData = factory(TaskStatus::class)->make()->toArray();
        $data = Arr::only($factoryData, ['name']);
        $response = $this->patch(route('taskstatuses.update', $taskStatus), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDestroy()
    {
        $taskStatus = factory(TaskStatus::class)->create();
        $response = $this->delete(route('taskstatuses.destroy', [$taskStatus]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('task_statuses', ['id' => $taskStatus->id]);
    }
}
