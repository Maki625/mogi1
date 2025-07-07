<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();
        $products = [
            [
            'user_id' => 1,
            'product_name' => '腕時計',
            'price' => 15000,
            'brand_name' => 'Rolex',
            'product_image' => 'storage/images/watch.jpg',
            'product_description' => 'スタイリッシュなデザインのメンズ腕時計',
            'product_condition' => 1,
            ],

            [
            'user_id' => 1,
            'product_name' =>'HDD',
            'price' => 5000,
            'brand_name' => '西芝',
            'product_image' => 'storage/images/HDD.jpg',
            'product_description' => '高速で信頼性の高いハードディスク',
            'product_condition' => 2,
            ],

            [
            'user_id' => 1,
            'product_name' => '玉ねぎ3束',
            'price' => 300,
            'product_image' => 'storage/images/onions.jpg',
            'product_description' => '新鮮な玉ねぎ3束のセット',
            'product_condition' => 3,
            ],

            [
            'user_id' => 1,
            'product_name' => '革靴',
            'price' => 4000,
            'product_image' => 'storage/images/Leather.jpg',
            'product_description' => 'クラシックなデザインの革靴',
            'product_condition' => 4,
            ],

            [
            'user_id' => 1,
            'product_name' => 'ノートPC',
            'price' => 45000,
            'product_image' => 'storage/images/laptop.jpg',
            'product_description' => '高性能なノートパソコン',
            'product_condition' => 1,
            ],

            [
            'user_id' => 1,
            'product_name' => 'マイク',
            'price' => 8000,
            'product_image' => 'storage/images/mic.jpg',
            'product_description' => '高音質のレコーディング用マイク',
            'product_condition' => 2,
            ],

            [
            'user_id' => 1,
            'product_name' => 'ショルダーバッグ',
            'price' => 3500,
            'product_image' => 'storage/images/bag.jpg',
            'product_description' => 'おしゃれなショルダーバッグ',
            'product_condition' => 3,
            ],

            [
            'user_id' => 1,
            'product_name' => 'タンブラー',
            'price' => 500,
            'product_image' => 'storage/images/Tumbler.jpg',
            'product_description' => '使いやすいタンブラー',
            'product_condition' => 4,
            ],

            [
            'user_id' => 1,
            'product_name' => 'コーヒーミル',
            'price' => 4000,
            'brand_name' => 'Starbacks',
            'product_image' => 'storage/images/CoffeeGrinder.jpg',
            'product_description' => '手動のコーヒーミル',
            'product_condition' => 1,
            ],

            [
            'user_id' => 1,
            'product_name' => 'メイクセット',
            'price' => 2500,
            'product_image' => 'storage/images/makeup.jpg',
            'product_description' => '便利なメイクアップセット',
            'product_condition' => 2,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'user_id' => $product['user_id'],
                'product_name' => $product['product_name'],
                'price' => $product['price'],
                'product_image' => $product['product_image'],
                'product_description' => $product['product_description'],
                'product_condition' => $product['product_condition'],
                'brand_name' => $product['brand_name'] ?? null,
            ]);
        }
    }
}
