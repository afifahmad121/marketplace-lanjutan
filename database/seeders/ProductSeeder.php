<?php

namespace Database\Seeders;


// use App\database\seeders\ProductCategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $categoryIds = DB::table('product_categories')->pluck('id')->toArray();
        $userIds     = DB::table('users')->where('role', 'seller')->pluck('id')->toArray();

        DB::table('products')->insert([
          [

              'title' => 'MacBook Pro M3',
              'description' => 'Powerful laptop with Apple M3 chip, 8GB Unified Memory, and 512GB SSD.',
              'price' => 27999000,
              'rating' => 8.7,
              'file_path' => 'files/macbook-pro-m3-specification.zip',
              'thumbnail' => 'image-product/macbook-m3.jpg',
              'download_count' => 15,
              'status' => 'active',
              'category_id' => $categoryIds [0] ?? 1,
              'seller_id' => $userIds[4] ?? 5,
              'created_at' => now(),
              'updated_at' => now()
            ],

            [

            'title' => 'ASUS ROG Strix G16 Gaming Laptop',
            'description' => 'Gaming laptop powered by Intel Core i7, RTX 4060, 16GB RAM, and 1TB SSD for high-performance gaming.',
            'price' => 22999000,
            'rating' => 9.1,
            'file_path' => 'files/The-ASUS-ROG-Strix-G16-is-a-high.zip',
            'thumbnail' => 'image-product/laptop-asus-rog-strix-g16.jpg',
            'download_count' => 25,
            'status' => 'active',
            'category_id' => $categoryIds[0] ?? 1,
            'seller_id' => $userIds[2] ?? 3,
            'created_at' => now(),
            'updated_at' => now()

            ]



        ]);
    }
}
