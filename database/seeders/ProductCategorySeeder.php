<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('product_categories')->insert([
            [

                'name' => 'office laptop',
                'description' => 'Lightweight and reliable laptops optimized for daily productivity and office work.',
                'icon' => 'icon/office-laptop.png',
                'created_at' => now(),
                'updated_at' => now()

            ],

            [

                'name' => 'laptop Gaming',
                'description' => 'a high-spec portable device specifically designed to run graphics-intensive games',
                'icon' => 'icon/laptop-gaming.png',
                'created_at' => now(),
                'updated_at' => now()

            ],

            [

                'name' => 'pc desktop',
                'description' => 'Powerful stationary computers suitable for heavy workstation tasks and upgrading.',
                'icon' => 'icon/PC-desktop.png',
                'created_at' => now(),
                'updated_at' => now()

            ]
        ]);


    }
}
