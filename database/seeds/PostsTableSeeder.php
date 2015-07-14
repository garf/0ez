<?php

use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Factory::times(30)->create(App\Models\Posts::class);
    }
}
