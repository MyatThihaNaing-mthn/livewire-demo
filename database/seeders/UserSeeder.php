<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch the role IDs dynamically to avoid hardcoding
        $userRoleId = DB::table('roles')->where('name', 'user')->value('id');
        $guestRoleId = DB::table('roles')->where('name', 'guest')->value('id');
        // Seed a user with the 'blog user' role
        if ($userRoleId) {
            User::firstOrCreate(
                ['email' => 'user@example.com'],
                [
                    'name' => 'User',
                    'password' => Hash::make('password'),
                    'role_id' => $userRoleId,
                ]
            );
        }

        if ($guestRoleId) {
            User::firstOrCreate(
                ['email' => 'guest@example.com'],
                [
                    'name' => 'Guest User',
                    'password' => Hash::make('password'),
                    'role_id' => $guestRoleId,
                ]
            );
        }
        
    }
}