<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles=['asd','asd','asd','asd asd'];
        foreach($articles as $article) 
        {

            DB::table('articles')->insert([
               'category_id' => 2,
               'title' => 'titleeeee xdxd',
               'image'=>'https://source.unsplash.com/random',
               'content' => 'contenttttt',
               'slug' => Str::slug("titleeeee xdxd","-"),
               'created_at' => now(),
               'updated_at' => now()

            ]);

        }


    }
 }