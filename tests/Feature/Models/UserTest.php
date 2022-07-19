<?php

namespace Tests\Feature\Models;

use App\Models\User;
use App\Models\Post;
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

        $this->assertInstanceOf(Collection::class, $user->post);
    }
    
    public function test_users_table_has_required_columns(){

        $user = User::factory()->create();

        

        //dd($user->attributesToArray());

        $this->assertDatabaseHas('users', [

            'id' => $user->getAttribute('id'),
            'login' => $user->getAttribute('login'),
            'password' => $user->getAttribute('password'),
            'nickname' => $user->getAttribute('nickname'),
            'email' => $user->getAttribute('email')
        ]);

    }
}
