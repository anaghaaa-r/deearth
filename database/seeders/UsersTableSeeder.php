<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'deearth',
            'password' => Hash::make('orange'),
            'isAdmin' => true,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
