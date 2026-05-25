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
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'testing@gmail.com',
            'mobile' => '7814557470',
            'password' => bcrypt('password'),
            'department' => 1,
            'role_id' => 1,
            'is_active' => true,


        ]);
    }
}
