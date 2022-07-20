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

    public function test_user_table_has_required_columns(){

        $user = Schema::getColumnListing('users');

            $this->assertContains('id', $user);
            $this->assertContains('login', $user);
            $this->assertContains('nickname', $user);
            $this->assertContains('name', $user);
            $this->assertContains('email', $user);
            $this->assertContains('email_verified_at', $user);
            $this->assertContains('password', $user);
            $this->assertContains('remember_token', $user);
            $this->assertContains('created_at', $user);
            $this->assertContains('updated_at', $user);

}
    
}
