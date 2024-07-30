<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class ClearRolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Deshabilitar las restricciones de claves externas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Eliminar todos los permisos
        DB::table('permissions')->truncate();

        // Eliminar todos los roles
        DB::table('roles')->truncate();

        // Eliminar tablas pivote relacionadas
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();

        // Habilitar las restricciones de claves externas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
