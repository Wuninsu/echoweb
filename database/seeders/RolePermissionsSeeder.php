<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cache to avoid conflicts
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            // User Management
            'view users',
            'create users',
            'edit users',
            'delete users',
            'assign roles',
            'revoke roles',
            'view profile',

            // Role and Permission Management
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view permissions',
            'manage permissions',
            'assign permissions',

            // Messaging and Notifications
            'send notifications',
            'view notifications',
            'delete notifications',

            // System Settings
            'view settings',
            'edit settings',

            // Moderation
            'moderate content',
            'ban users',
            'unban users',

        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles and the permissions assigned to each
        $roles = [
            'super-admin' => Permission::all()->pluck('name')->toArray(), // All permissions for super-admin
            'admin' => [
                'view users',
                'create users',
                'edit users',
                'delete users',
                'assign roles',
                'revoke roles',
                'view profile',

                'view roles',
                'view permissions',

                'send notifications',
                'view notifications',
                'delete notifications',

                'view settings',
                'edit settings',

                'moderate content',
                'ban users',
                'unban users',
            ]
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            // Assign permissions to the role
            $role->syncPermissions($rolePermissions);
        }
    }
}
