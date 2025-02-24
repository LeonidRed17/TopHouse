<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReactionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reactions')->insert([
            ['name' => 'heart','icon_class' => 'bi bi-heart-fill',],
            ['name' => 'thumbUp','icon_class' => 'bi-hand-thumbs-up-fill',],
            ['name' => 'laugh','icon_class' => 'bi-emoji-laughing-fill',],
            ['name' => 'surpirse','icon_class' => 'bi-emoji-surprise-fill',],
            ['name' => 'heartEyes','icon_class' => 'bi-emoji-heart-eyes',],
        ]);
    }
}
