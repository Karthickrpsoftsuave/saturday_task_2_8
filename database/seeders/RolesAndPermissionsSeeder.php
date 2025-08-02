<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Clear cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'access dashboard']); // For customers
        Permission::create(['name' => 'access index']);     // For owners
        Permission::create(['name' => 'access create']);    // For owners
        Permission::create(['name' => 'access edit']);      // For owners

        // Create customer role and assign dashboard permission
        $customerRole = Role::create(['name' => 'customer']);
        $customerRole->givePermissionTo('access dashboard');

        // Create owner role and assign index, create, and edit permissions
        $ownerRole = Role::create(['name' => 'owner']);
        $ownerRole->givePermissionTo(['access index', 'access create', 'access edit']);
    }
}
