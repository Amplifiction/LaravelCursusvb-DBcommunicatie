<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void //oproepen in de DatabaseSeeder.
    {
        //Leegmaken van tabellen
            //DB::table('posts')->truncate();
            //DB::table('comments')->truncate();

        //Manuele posts. Overbodig door factory.
            // $post = new Post;
            // $post->title = 'Mijn artikel, via seeder';
            // $post->subtitle = 'Een ondertitel';
            // $post->url = 'mijn-arikel';
            // $post->published = 1;
            // $post->status = 'final';
            // $post->content = 'Dit is de content';
            // $post->save();

        $posts = Post::factory()
            ->count(3)
            ->has(Comment::factory()->count(rand(0,5)))
            ->create();

        //SEEDER UITVOEREN: php artisan db:seed
    }
}
