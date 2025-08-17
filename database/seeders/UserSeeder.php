<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
     /*
     ** Run the database seeds.
     */
    public function run(): void
    {
        // Cria usuário admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('senha123'), // Altere para uma senha segura
            'email_verified_at' => now(),
        ]);

        // Cria usuários de teste (opcional)
        User::factory()->count(10)->create();
    }
}
