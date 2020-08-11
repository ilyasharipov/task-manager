<?php

namespace Tests\Feature;

use App\User;
use App\Task;
use App\TaskStatus;
use Illuminate\Support\Arr;
use Spatie\Tags\Tag;
use Tests\TestCase;

class TaskTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
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
        $tags = factory(Tag::class)->create(8);
        $tasks = factory(TaskStatus::class)->create(4);
        $factoryData = factory(Task::class)->make()->toArray();
        $data = Arr::only($factoryData, [
            'name',
            'description',
            'status_id',
            'assigned_to_id',
            'tags'
        ]);
        $response = $this->post(route('tasks.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testShow()
    {
        $task = factory(Task::class)->create();
        $response = $this->get(route('tasks.show', $this->task->id));
        $taskName = $this->task->name;
        $response->assertStatus(200)->assertSeeText($taskName);
    }

    public function testTasksUpdate()
    {
        $user = factory(User::class)->create();

        $requestData = [
            'name' => 'java',
            'description' => 'add camel framework',
            'status_id' => (string) $this->taskStatus->id,
            'creator_id' => (string) $this->user->id,
            'assigned_to_id' => (string) $user->id
        ];

        $url = route('tasks.update', $this->task);
        $response = $this->patch($url, $requestData);
        $response->assertStatus(302);
        $this->task->refresh();
        $this->assertDatabaseHas('tasks', $requestData);
    }
}
