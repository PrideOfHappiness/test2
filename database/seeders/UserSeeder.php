<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kode_users' => 'U0001',
            'nama' => 'User 1',
            'status' => 'Users',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'kode_users' => 'A0001',
            'nama' => 'Admin 1',
            'status' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
