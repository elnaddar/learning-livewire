<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(["name"=> "edit user"]);
        Permission::create(["name"=> "delete user"]);
        Permission::create(["name"=> "create user"]);
        Permission::create(["name"=> "read user"]);

        $role = Role::create(["name"=> "user-reader"]);
        $role->givePermissionTo("read user");

        $role = Role::create(["name"=> "super-admin"]);
        $role->givePermissionTo(Permission::all());
    }
}
