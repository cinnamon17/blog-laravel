<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
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

    public function test_posts_table_has_required_columns(){

        $schema = Schema::getColumnListing('posts');

            $this->assertContains('id', $schema);
            $this->assertContains('title', $schema);
            $this->assertContains('published_at', $schema);
            $this->assertContains('content', $schema);
            $this->assertContains('status', $schema);
            $this->assertContains('users_id', $schema);
            $this->assertContains('categories_id', $schema);

    }
}
