<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Response;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     *
     * @return void
     */
    public function test_GetUsers_HavingNoParameters_ReturnsListOfUsers()
    {
        $userController = $this->partialMock(UserController::class, function (MockInterface $mock) {
            $mock->shouldReceive('getAllRecords')->andReturn(User::factory()->count(10)->make());
        });

        $response = $userController->index();

        $users = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('users', $users);
        $this->assertCount(10, $users['users']);
        $this->assertEquals(Response::HTTP_OK, $response->status());
    }

    /**
     * A basic unit test example.
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     *
     * @return void
     */
    public function test_GetUsers_HavingNoParameters_ReturnsEmpty()
    {
        $userController = $this->partialMock(UserController::class, function (MockInterface $mock) {
            $mock->shouldReceive('getAllRecords')->andReturn(collect([]));
        });

        $response = $userController->index();

        $users = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('users', $users);
        $this->assertCount(0, $users['users']);
        $this->assertEquals(Response::HTTP_OK, $response->status());
        $this->assertEmpty($users['users']);
        $this->assertJson($response->getContent());
    }
}
