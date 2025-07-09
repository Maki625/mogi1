<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $names = ['ファッション', '家電', 'インテリア',
        'レディース', 'メンズ', 'コスメ', '本', 'ゲーム', 'スポーツ', 'キッチン', 'ハンドメイド', 'アクセサリー', 'おもちゃ', 'ベビー・キッズ'];

            $data = [];

            foreach ($names as $name) {
                $data[] = ['name' => $name];
            }

            DB:: table('categories')->insert($data);

    }
}
