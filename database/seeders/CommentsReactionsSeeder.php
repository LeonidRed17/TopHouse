<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentsReactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments_reactions')->insert([
            ['count' => 1,'reaction_id' =>1, 'comments_id' => 1],
            ['count' => 1,'reaction_id' =>1, 'comments_id' => 2],
            ['count' => 1,'reaction_id' =>1, 'comments_id' => 3],
            ['count' => 1,'reaction_id' =>2, 'comments_id' => 1],
            ['count' => 1,'reaction_id' =>3, 'comments_id' => 1],

            ['count' => 1,'reaction_id' =>1, 'comments_id' => 2],
            ['count' => 1,'reaction_id' =>3, 'comments_id' => 3],
            ['count' => 1,'reaction_id' =>1, 'comments_id' => 4],
            ['count' => 1,'reaction_id' =>4, 'comments_id' => 5],
            ['count' => 1,'reaction_id' =>5, 'comments_id' => 2],

            ['count' => 1,'reaction_id' =>3, 'comments_id' => 9],
            ['count' => 1,'reaction_id' =>3, 'comments_id' => 3],
            ['count' => 1,'reaction_id' =>3, 'comments_id' => 1],
            ['count' => 1,'reaction_id' =>4, 'comments_id' => 3],
            ['count' => 1,'reaction_id' =>5, 'comments_id' => 2],
        ]);

    }
}
