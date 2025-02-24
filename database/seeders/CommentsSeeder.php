<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            ['content' => 'Мне понравилось!', 'author' => 'Владислав', 'news_id' => 1],
            ['content' => 'Отлично!', 'author' => 'Павел', 'news_id' => 1],
            ['content' => 'Ого! Здорово!', 'author' => 'Антон', 'news_id' => 1],

            ['content' => 'Отличные коты!!', 'author' => 'Владислав', 'news_id' => 2],
            ['content' => 'Супер!', 'author' => 'Павел', 'news_id' => 2],
            ['content' => 'Дайте десять!', 'author' => 'Антон', 'news_id' => 2],

            ['content' => 'Природа - наше всё.', 'author' => 'Владислав', 'news_id' => 3],
            ['content' => 'Умиротворительно.', 'author' => 'Павел', 'news_id' => 3],
            ['content' => 'Хочу сюда.', 'author' => 'Антон', 'news_id' => 3]

        ]);
    }
}
