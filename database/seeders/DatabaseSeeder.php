<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        News::factory(10)->create();
        Category::factory(11)->create();
        for ($i = 1; $i < 11; $i++) {
            DB::table('news_categories')->insert([
                'news_id' => $i,
                'category_id' => $i,
            ]);
            DB::table('news_categories')->insert([
                'news_id' => $i,
                'category_id' => 11,
            ]);
        }
        Comment::factory(100)->create();
    }
}
