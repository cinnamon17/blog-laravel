<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_comment_belongs_to_user()
    {
        $comment = Comment::factory()->create();

        $this->assertInstanceOf(User::class, $comment->user);
    }

    public function test_comment_belongs_to_post()
    {
        $comment = Comment::factory()->create();

        $this->assertInstanceOf(Post::class, $comment->post);
    }

    public function test_comments_table_has_required_columns(){

        $comment = Comment::factory()->create();

        $this->assertDatabaseHas('comments', [

            'id' =>      $comment->getAttribute('id'),
            'comment' => $comment->getAttribute('comment'),
            'user_id' => $comment->getAttribute('user_id'),
            'post_id' => $comment->getAttribute('post_id'),
        ]);

    }
}
