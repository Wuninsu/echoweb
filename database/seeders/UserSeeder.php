<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert users with the provided data
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'username' => 'Sp-admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('test1234'),
                'uuid' => Str::uuid(),
            ],
            [
                'name' => 'Administrator',
                'username' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('test1234'),
                'uuid' => Str::uuid(),
            ],
        ]);

        // Assign roles to users based on usernames
        $usersWithRoles = [
            'Sp-admin' => 'super-admin',
            'Admin' => 'admin',
        ];

        foreach ($usersWithRoles as $username => $roleName) {
            // Fetch user by username
            $user = User::where('username', $username)->first();
            if ($user) {
                // Assign role
                $user->assignRole($roleName);
            }
        }
    }
}
