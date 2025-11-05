<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user@example.hu',
            'password' => bcrypt('aaaaaaaa'),
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.hu',
            'password' => bcrypt('bbbbbbbb'),
            'role' => 1,
        ]);
    }
}
