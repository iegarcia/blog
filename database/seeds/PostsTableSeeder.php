<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class)->times(30)->create()->each(function(App\Post $post){
          $post->tags()->attach([
            rand(1,5),
            rand(6,10)
          ]);
        });
    }
}
