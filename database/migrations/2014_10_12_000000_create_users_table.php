<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('role', 60)->default('author');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('active')->default(0);
        });

        $user = new \App\Models\Users();
        $user->name = '0ez';
        $user->email = '0ez@example.com';
        $user->password = '123456';
        $user->role = 'admin';
        $user->active = '1';
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
