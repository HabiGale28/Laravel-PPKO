<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB
use Illuminate\Support\Facades\Hash; // Import Hash

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. User Superadmin (admin lama Anda)
        DB::table('users')->insert([
            'name' => 'Administrator', // 'nama_lengkap'
            'username' => 'admin',
            'email' => 'admin@wonderfulindonesia.com',
            'password' => Hash::make('password'), // Kita set 'password' (sesuai file login.php lama)
            'role' => 'superadmin',
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. User Editor (editor1 lama Anda)
        DB::table('users')->insert([
            'name' => 'Editor Satu',
            'username' => 'editor1',
            'email' => 'editor1@wonderfulindonesia.com',
            'password' => Hash::make('password'), // Kita set 'password' juga
            'role' => 'editor',
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}