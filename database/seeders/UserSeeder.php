<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            0 =>
                array(
                    'name' => 'Administrador',
                    'email' => 'admin@admin.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'role' => 'admin'
                ),
            1 =>
                array(
                    'name' => 'Usuário',
                    'email' => 'usuario@usuario.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('12345678'),
                    'role' => 'general'
                )
            )
        );
    }
}
