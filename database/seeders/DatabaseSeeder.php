<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (! app()->isLocal()) {
            $this->command->warn('Seeder omitido: solo se ejecuta en entorno local.');
            return;
        }

        // Administrador ASONOG
        User::firstOrCreate(
            ['email' => 'admin@asonog.hn'],
            [
                'name'               => 'Administrador ASONOG',
                'password'           => \Illuminate\Support\Facades\Hash::make('Admin@1234!'),
                'role'               => 'admin',
                'email_verified_at'  => now(),
            ]
        );

        // Becario de prueba
        User::firstOrCreate(
            ['email' => 'becario@asonog.hn'],
            [
                'name'               => 'Becario Demo',
                'password'           => \Illuminate\Support\Facades\Hash::make('Becario@1234!'),
                'role'               => 'becario',
                'email_verified_at'  => now(),
            ]
        );
    }
}
