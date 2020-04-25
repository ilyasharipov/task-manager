<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use App\TaskStatus;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    private $taskStatus;
    
    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
        $this->taskStatus = TaskStatus::create(['name' => 'new']);
    }

    public function testTaskStatusesIndex()
    {
        $response = $this->get(route('taskstatuses.index'));
        $response->assertStatus(200)->assertSee($this->taskStatus->name);
    }

    public function testTaskStatusesCreate()
    {
        $response = $this->get(route('taskstatuses.create'));
        $response->assertStatus(200);

        $requestData = [
            'name' => 'completed',
        ];
        
        $response = $this->post(route('taskstatuses.store', $requestData));
        $this->assertDatabaseHas('task_statuses', $requestData);
    }

    public function testTaskStatusesUpdate()
    {
        $requestData = [
            'name' => 'completed',
        ];

        $url = route('taskstatuses.update', $this->taskStatus);
        $response = $this->patch($url, $requestData);
        $response->assertStatus(302);
        $this->taskStatus->refresh();
        $this->assertDatabaseHas('task_statuses', $requestData);
    }
}
