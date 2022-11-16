<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {

            $post = new Post;
            $post->user_id = 1;
            $post->title = $faker->sentence(6);
            $post->content = $faker->paragraphs(2,true);
            $post->cover_image = $faker->imageUrl(1600,600,'books');
            $post->save();
        }
    }
}