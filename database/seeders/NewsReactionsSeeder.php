<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NewsReactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news_reactions')->insert([
            ['count' => 1,'reaction_id' =>1, 'news_id' => 2],
            ['count' => 1,'reaction_id' =>1, 'news_id' => 2],
            ['count' => 1,'reaction_id' =>1, 'news_id' => 2],
            ['count' => 1,'reaction_id' =>1, 'news_id' => 2],
            ['count' => 1,'reaction_id' =>2, 'news_id' => 2],

            ['count' => 1,'reaction_id' =>2, 'news_id' => 3],
            ['count' => 1,'reaction_id' =>3, 'news_id' => 3],
            ['count' => 1,'reaction_id' =>1, 'news_id' => 3],
            ['count' => 1,'reaction_id' =>4, 'news_id' => 3],
            ['count' => 1,'reaction_id' =>5, 'news_id' => 3],
        ]);

    }
}