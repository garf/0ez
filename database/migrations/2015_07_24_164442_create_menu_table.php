<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('position', 50)->default('top');
            $table->string('title', 255);
            $table->string('url', 255);
            $table->string('active_item', 50);
            $table->boolean('on_blank')->default(0);
            $table->integer('sort')->default(0);
            $table->timestamps();
        });

        $menu = new App\Models\Menu();
        $menu->parent_id = 0;
        $menu->position = 'top';
        $menu->title = 'Home';
        $menu->url = '/';
        $menu->active_item = 'index';
        $menu->on_blank = false;
        $menu->sort = 100;
        $menu->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu');
    }
}
