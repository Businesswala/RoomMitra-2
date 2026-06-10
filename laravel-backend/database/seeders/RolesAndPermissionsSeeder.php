<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Admin\Models\Role;
use App\Modules\Admin\Models\Permission;
use App\Modules\Authentication\Models\User;
use App\Modules\Admin\Models\Admin;
use Illuminate\SupportFacades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Roles
        $adminRole = Role::create(['name' => 'Admin']);
        $listerRole = Role::create(['name' => 'Lister']);
        $userRole = Role::create(['name' => 'User']);

        // 2. Create Permissions
        $permissions = [
            'manage-users',
            'manage-listers',
            'manage-listings',
            'approve-listings',
            'verify-documents',
            'manage-plans',
            'manage-ads',
            'view-revenue',
            'manage-support',
            'manage-cms',
            'create-listing',
            'edit-listing',
            'delete-listing',
            'buy-plan',
            'view-listings',
            'send-messages',
            'write-reviews',
        ];

        foreach ($permissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        // 3. Attach permissions to Roles
        // Admin permissions: All
        $allPermissions = Permission::all();
        $adminRole->permissions()->attach($allPermissions->pluck('id'));

        // Lister permissions
        $listerPermissions = Permission::whereIn('name', [
            'create-listing',
            'edit-listing',
            'delete-listing',
            'buy-plan',
            'view-listings',
            'send-messages',
        ])->get();
        $listerRole->permissions()->attach($listerPermissions->pluck('id'));

        // User permissions
        $userPermissions = Permission::whereIn('name', [
            'view-listings',
            'send-messages',
            'write-reviews',
        ])->get();
        $userRole->permissions()->attach($userPermissions->pluck('id'));

        // 4. Seed Seed Default Admin User
        Admin::create([
            'name' => 'RoomMitra Root Admin',
            'email' => 'admin@roommitra.com',
            'password' => Hash::make('AdminRoomMitraPass123'),
        ]);

        // 5. Seed Demonstration Lister and User
        User::create([
            'role' => 'lister',
            'name' => 'Alpesh Patel',
            'email' => 'alpesh@roommitra.com',
            'mobile' => '9998887776',
            'password' => Hash::make('password'),
            'status' => 'active',
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
        ]);

        User::create([
            'role' => 'user',
            'name' => 'Ketan Shah',
            'email' => 'ketan@roommitra.com',
            'mobile' => '8887776665',
            'password' => Hash::make('password'),
            'status' => 'active',
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
        ]);
    }
}
