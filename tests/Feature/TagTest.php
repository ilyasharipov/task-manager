<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Tag;

class TagTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    private $tag;
    
    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
        $this->tag = Tag::create(['name' => 'java']);
    }

    public function testTagsIndex()
    {
        $response = $this->get(route('tags.index'));
        $response->assertStatus(200)->assertSee($this->tag->name);
    }

    public function testTagsCreate()
    {
        $response = $this->get(route('tags.create'));
        $response->assertStatus(200);

        $requestData = [
            'name' => 'python',
        ];
        
        $response = $this->post(route('tags.store', $requestData));
        $this->assertDatabaseHas('tags', $requestData);
    }
}
