<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{

    public function run()
    {
        // Verificar y crear el rol de admin si no existe
        if (!Role::where('name', 'admin')->exists()) {
            $adminRole = Role::create(['name' => 'admin']);
        } else {
            $adminRole = Role::where('name', 'admin')->first();
        }

        // Verificar y crear el rol de visitor si no existe
        if (!Role::where('name', 'visitor')->exists()) {
            $visitorRole = Role::create(['name' => 'visitor']);
        } else {
            $visitorRole = Role::where('name', 'visitor')->first();
        }

        // Verificar y crear permisos si no existen
        if (!Permission::where('name', 'view dashboard')->exists()) {
            $viewDashboard = Permission::create(['name' => 'view dashboard']);
        } else {
            $viewDashboard = Permission::where('name', 'view dashboard')->first();
        }

        if (!Permission::where('name', 'manage users')->exists()) {
            $manageUsers = Permission::create(['name' => 'manage users']);
        } else {
            $manageUsers = Permission::where('name', 'manage users')->first();
        }

        // Asignar permisos a roles
        $adminRole->givePermissionTo($viewDashboard);
        $adminRole->givePermissionTo($manageUsers);
        $visitorRole->givePermissionTo($viewDashboard);
    }

}
