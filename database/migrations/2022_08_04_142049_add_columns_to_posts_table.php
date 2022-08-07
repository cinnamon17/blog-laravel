<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->string('title',150)->nullable();
            $table->timestamp('published_at')->nullable();
            $table->text('content')->nullable();
            $table->char('status',8)->nullable();
            $table->integer('users_id')->nullable();
            $table->integer('categories_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropIfExists('posts');

        });
    }
};
