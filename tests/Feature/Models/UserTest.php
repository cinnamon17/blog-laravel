<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_has_many_comments()
    {

        $user = User::factory()
            ->has(Comment::factory()->count(3))
            ->create();

        $this->assertTrue($user);
    }
}
