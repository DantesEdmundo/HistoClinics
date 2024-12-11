<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Administrador'],
            ['name' => 'Facturador'],
            ['name' => 'Doctor']
        ]);

        DB::table('document_types')->insert([
            ['name' => 'Cedula de ciudadania', 'abreviature' => 'CC'],
            ['name' => 'Tarjeta de identidad', 'abreviature' => 'TI'],
            ['name' => 'Registro civil', 'abreviature' => 'RC'],
            ['name' => 'Numero de identificacion tributaria', 'abreviature' => 'NIT'],
        ]);

        DB::table('users')->insert([
            'id_document_type' => 1,
            'document_number' => 10101112,
            'name' => 'Jhon',
            'last_name' => 'Doe',
            'email' => 'jhondoe@nomail.com',
            'password' => bcrypt('password'), // Hash the password
            'remember_token' => Str::random(10),
            'id_rol' => 1,
        ]);
    }
}
