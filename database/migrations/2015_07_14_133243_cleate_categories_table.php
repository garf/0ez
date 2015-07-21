<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CleateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('seo_title', 255);
            $table->string('seo_keywords', 255);
            $table->string('seo_description', 512);
            $table->string('slug', 255);
            $table->timestamps();
        });
        $category = new \App\Models\Categories;
        $category->title = 'Без рубрики';
        $category->slug = 'unbound';
        $category->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
