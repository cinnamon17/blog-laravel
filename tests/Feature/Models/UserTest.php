<?php

namespace Tests\Feature\Models;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
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

        $schema = Schema::getColumnListing('users');

            $this->assertContains('login', $schema);
            $this->assertContains('nickname', $schema);
            $this->assertContains('name', $schema);
            $this->assertContains('password', $schema);
            $this->assertContains('email', $schema);

    }
    
}
