<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Création des rôles
        $adminRole = Role::create(['name' => 'superadmin']);
        $managerRole = Role::create(['name' => 'manager']);
        $employeeRole = Role::create(['name' => 'employee']);

        // Création des permissions
        $createUserPermission = Permission::create(['name' => 'create user']);
        $editUserPermission = Permission::create(['name' => 'edit user']);
        $deleteUserPermission = Permission::create(['name' => 'delete user']);

        // Attribution des permissions aux rôles
        $adminRole->syncPermissions([$createUserPermission, $editUserPermission, $deleteUserPermission]);
        $managerRole->syncPermissions([$createUserPermission, $editUserPermission]);
        $employeeRole->syncPermissions([$editUserPermission]);
    }
}
