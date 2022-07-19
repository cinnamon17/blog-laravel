<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_has_many_comments()
    {

        $user = User::factory()->create();

        $this->assertInstanceOf(Collection::class, $user->comment);

    }

    public function test_user_has_many_posts(){

        $user = User::factory()->create();

        $this->assertInstanceOf(Post::class, $user->post);
    }
}
