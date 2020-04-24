<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\withoutExceptionHandling;
use App\Task;
use App\User;
use App\TaskStatus;
use Tests\TestCase;

// вещь для проверки ошибок ---> $this->withoutExceptionHandling();

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    private $user;
    private $task;
    private $taskStatus;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
        $this->task = factory(Task::class)->create();
        $this->taskStatus = TaskStatus::create(['name' => 'new']);
    }

    public function testTasksIndex()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200)->assertSee($this->task->name);
    }

    public function testTasksShow()
    {
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
