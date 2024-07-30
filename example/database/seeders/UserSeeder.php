<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear un usuario solo si no existe
        User::firstOrCreate([
            'email' => 'test@example.com'
        ], [
            'name' => 'Test User',
            'password' => bcrypt('1234'),
            // Otros campos necesarios
        ]);
    }
}
