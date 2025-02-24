<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            ['title' => 'Новые дома', 'content' => 'Нашей компанией были построены новые дома. Заказчики довольны.', 'author' => 'Владимир', 'img' => 'https://honka.com/gb/wp-content/uploads/sites/11/2016/06/melody-exterior2-0x820-c-center.jpg', 'category_id' => 1],
            ['title' => 'Новые коты', 'content' => 'Нашей компанией были разработаны новые коты. Человеки довольны лицезреть новых котов.', 'author' => 'Владимир', 'img' => 'https://i.pinimg.com/736x/e7/20/da/e720dae7575ae813e602940d5be8016c.jpg', 'category_id' => 2],
            ['title' => 'Природа', 'content' => 'Просто красивая природа.', 'author' => 'Георгий', 'img' => 'https://avatars.mds.yandex.net/get-mpic/11740777/2a0000018b43673f259fb9a17d08c4b09fb3/orig', 'category_id' => 3]
        ]);
    }
}
