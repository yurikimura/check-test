<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // categories テーブルのデータを削除（IDもリセット）
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            ['name' => '商品のお届けについて'],
            ['name' => '商品の交換について'],
            ['name' => '商品トラブル'],
            ['name' => 'ショップへのお問い合わせ'],
            ['name' => 'その他'],
        ]);
    }
}
