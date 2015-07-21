<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('title');
            $table->text('excerpt');
            $table->longText('content');
            $table->string('img', 255);
            $table->string('slug', 512);
            $table->string('seo_title', 255);
            $table->string('seo_keywords', 255);
            $table->string('seo_description', 512);
            $table->boolean('is_pinned')->default(0);
            $table->enum('status', ['active', 'moderation', 'deleted', 'refused', 'draft'])->default('active');
            $table->dateTime('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
