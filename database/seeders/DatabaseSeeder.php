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

        DB::table('order_type')->insert([
            ['name_order' => 'Medicamentos'],
            ['name_order' => 'Exámen de laboratorio'],
            ['name_order' => 'Imágen diagnóstica'],
            ['name_order' => 'Procedimiento médico'],
            ['name_order' => 'Terapia'],
            ['name_order' => 'Cirugía']
        ]);

        DB::table('document_types')->insert([
            ['name' => 'Cedula de ciudadania', 'abreviature' => 'CC'],
            ['name' => 'Tarjeta de identidad', 'abreviature' => 'TI'],
            ['name' => 'Registro civil', 'abreviature' => 'RC'],
            ['name' => 'Numero de identificacion tributaria', 'abreviature' => 'NIT'],
        ]);

        DB::table('eps')->insert([
            ['name' => 'Sanitas', 'id_document_type' => 4, 'id_number'=> 101010],
            ['name' => 'Cruz Roja', 'id_document_type' => 4, 'id_number'=> 101011],
            ['name' => 'Café salud', 'id_document_type' => 4, 'id_number'=> 101012],
            ['name' => 'Proseguir', 'id_document_type' => 4, 'id_number'=> 101013],
        ]);

        DB::table('patients')->insert(
            [
                [
                'name'=> 'Carlos',
                'last_name'=> 'Zapata',
                'birthdate'  => '1989-12-03',
                'id_document_type'=> 1,
                'document_number'=> 101011,
                'address'=> 'Cll 5a',
                'phone'=> '3102310003',
                'id_eps'=> 1,
                ],
                [
                'name'=> 'Monica',
                'last_name'=> 'Aguilar',
                'birthdate'  => '1991-12-03',
                'id_document_type'=> 1,
                'document_number'=> 101012,
                'address'=> 'Cll 5a',
                'phone'=> '3102310003',
                'id_eps'=> 2,
                ],
                [
                'name'=> 'Humberto',
                'last_name'=> 'Bonilla Salazar',
                'birthdate'  => '1995-12-03',
                'id_document_type'=> 1,
                'document_number'=> 101013,
                'address'=> 'Cll 5a',
                'phone'=> '3102310003',
                'id_eps'=> 2,
                ],
                [
                'name'=> 'Cristian',
                'last_name'=> 'Flores',
                'birthdate'  => '202-12-03',
                'id_document_type'=> 2,
                'document_number'=> 101014,
                'address'=> 'Cll 5a',
                'phone'=> '3102310003',
                'id_eps'=> 2,
                ],
            ]
        );

        DB::table('users')->insert(
            [
                [
                    'id_document_type' => 1,
                    'document_number' => 10101112,
                    'name' => 'Jhon',
                    'last_name' => 'Doe',
                    'email' => 'jhondoe@nomail.com',
                    'password' => bcrypt('password'), // Hash the password
                    'remember_token' => Str::random(10),
                    'id_rol' => 1,
                ],
                [
                    'id_document_type' => 1,
                    'document_number' => 10101113,
                    'name' => 'Ernesto',
                    'last_name' => 'Garcia',
                    'email' => 'ernestogarcia@nomail.com',
                    'password' => bcrypt('password'), // Hash the password
                    'remember_token' => Str::random(10),
                    'id_rol' => 2,
                ],
                [
                    'id_document_type' => 1,
                    'document_number' => 10101114,
                    'name' => 'Clara Ines',
                    'last_name' => 'Poveda',
                    'email' => 'clarapoveda@nomail.com',
                    'password' => bcrypt('password'), // Hash the password
                    'remember_token' => Str::random(10),
                    'id_rol' => 3,
                ],
                [
                    'id_document_type' => 1,
                    'document_number' => 10101115,
                    'name' => 'Victor Hugo',
                    'last_name' => 'Sanchez',
                    'email' => 'victorsanchez@nomail.com',
                    'password' => bcrypt('password'), // Hash the password
                    'remember_token' => Str::random(10),
                    'id_rol' => 3,
                ]
            ]
        );

        DB::table('appointments')->insert(
            [
                [
                    'id_patient'=> 3,
                    'id_doctor'=> 1,
                    'date_time'=> '2024-11-01 10:30:53',
                    'status'=> 'ok',
                ],
                [
                    'id_patient'=> 1,
                    'id_doctor'=> 1,
                    'date_time'=> '2024-12-17 17:30:53',
                    'status'=> 'ok',
                ],
                [
                    'id_patient'=> 2,
                    'id_doctor'=> 1,
                    'date_time'=> '2025-05-15 14:30:53',
                    'status'=> 'ok',
                ],
                [
                    'id_patient'=> 3,
                    'id_doctor'=> 2,
                    'date_time'=> '2025-03-10 16:30:53',
                    'status'=> 'ok',
                ],
            ]
        );

        DB::table('medical_records')->insert(
            [
                [
                   'id_patient'=> 3,
                   'id_doctor'=> 1,
                   'id_current_eps'=> 1,
                   'description'=> 'Phasellus sollicitudin tortor ac dolor mollis, eu malesuada purus egestas. Integer sed nibh eu mauris hendrerit vulputate a quis nunc. In viverra mi mi, sed pellentesque ipsum lobortis non. Integer egestas turpis id turpis aliquam dictum. Etiam non luctus dui. Morbi egestas dapibus auctor.',
                ],
                [
                   'id_patient'=> 1,
                   'id_doctor'=> 1,
                   'id_current_eps'=> 2,
                   'description'=> 'Phasellus sollicitudin tortor ac dolor mollis, eu malesuada purus egestas. Integer sed nibh eu mauris hendrerit vulputate a quis nunc. In viverra mi mi, sed pellentesque ipsum lobortis non. Integer egestas turpis id turpis aliquam dictum. Etiam non luctus dui. Morbi egestas dapibus auctor.',
                ]
            ]
        );

    }
}
