<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
             // Agent
             [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@agent.com',
                'password' => Hash::make('111'),
                'role' => 'agent',
                'status' => 'active',
            ],
             // User
             [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
            ],
        ]);
    }
}
