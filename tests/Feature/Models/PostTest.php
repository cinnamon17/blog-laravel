<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_posts_belong_to_user()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(User::class, $post->user);
    }
    
    public function test_posts_belong_to_category()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(Category::class, $post->category);
    }

    public function test_post_has_many_comments(){

        $post = Post::factory()->create();

        $this->assertInstanceOf(Collection::class, $post->comment);
    }
}
