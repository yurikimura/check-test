<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Category;

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
            ['content' => '商品のお届けについて'],
            ['content' => '商品の交換について'],
            ['content' => '商品トラブル'],
            ['content' => 'ショップへのお問い合わせ'],
            ['content' => 'その他'],
        ]);
    }
}

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 事前に categories にデータがあることを確認
        if (Category::count() == 0) {
            $this->call(CategorySeeder::class);
        }

        // 35件のダミーデータを作成
        Contact::factory(35)->create();
    }
}
