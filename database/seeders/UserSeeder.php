<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('users')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
      DB::table('users')->insert([
            [
                'username'   => 'John Designer',
                'email'      => 'john@marketplace.com',
                'password'   => Hash::make('password123'),
                'role'       => 'seller',
                'balance'    => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'username'   => 'Ahmad Buyer',
                'email'      => 'ahmad@gmail.com',
                'password'   => Hash::make('password123'),
                'role'       => 'buyer',
                'balance'    => 250000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'username'   => 'Michael Store',
                'email'      => 'michael@marketplace.com',
                'password'   => Hash::make('password123'),
                'role'       => 'seller',
                'balance'    => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'username'   => 'Siti Customer',
                'email'      => 'siti@gmail.com',
                'password'   => Hash::make('password123'),
                'role'       => 'buyer',
                'balance'    => 150000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'username'   => 'Kevin Assets',
                'email'      => 'kevin@marketplace.com',
                'password'   => Hash::make('password123'),
                'role'       => 'seller',
                'balance'    => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],

            ]);
    }
}

