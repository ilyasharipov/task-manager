<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUsersIndex()
    {
        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
    }

    public function testUsersShow()
    {
        $response = $this->get(route('users.show', $this->user));
        $userName = $this->user->name;

        $response->assertStatus(200)->assertSee($userName);
    }

    public function testUsersUpdate()
    {
        $requestData = [
            'nickname' => 'Update',
            'name' => 'updateName',
            'email' => 'update@email.com',
            'lastName' => 'Updaticus',
            'gender' => 'female',
            'birthday' => '2020-12-20',
            'type' => 'update_profile'
        ];

        $expected = [
            'nickname' => 'Update',
            'name' => 'updateName',
            'email' => 'update@email.com',
            'lastName' => 'Updaticus',
            'gender' => 'female',
            'birthday' => '2020-12-20',
        ];

        $url = route('users.update', $this->user);
        $response = $this->patch($url, $requestData);
        $response->assertStatus(302);
        $this->user->refresh();
        $this->assertDatabaseHas('users', $expected);
    }

    public function testUsersChangePassword()
    {
        $requestData = [
            'password_confirmation' => '12345678',
            'password' => '12345678',
            'type' => 'change_password'
        ];

        $newPassword = '12345678';

        $url = route('users.update', $this->user);
        $response = $this->patch($url, $requestData);
        $response->assertStatus(302);
        $this->user->refresh();
        $this->assertTrue(Hash::check($newPassword, $this->user->password));
    }
}
