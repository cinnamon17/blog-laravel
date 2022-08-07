<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category_has_many_posts()
    {
        $category = Category::factory()->create();

        $this->assertInstanceOf(Collection::class, $category->post);

    }

    public function test_category_has_required_columns(){

        $schema = Schema::getColumnListing('categories');

            $this->assertContains('id', $schema);
            $this->assertContains('category', $schema);

    }
}
