<?php

namespace App\Http\Controllers;

use App\Models\document_type;
use App\Models\rol;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class AdminController extends Controller
{
    public function getUsersView(){
        return view("admin.users");
    }

    public function createNewUserView(){
        $roles = rol::select('id', 'name')->get()->toArray();
        $document_types = document_type::select('id', 'name')->get()->toArray();

        $faker = Faker::create('es_ES');
        $testData = [
            'first_name'=> $faker->firstName,
            'last_name'=> $faker->lastName,
            'email'=> $faker->email,
            'document_num' => $faker->randomNumber(7, true),
        ];

        return view("admin/users_create")
            ->with("roles", $roles)
            ->with("document_types", $document_types)
            ->with('fakeData', $testData);
    }

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'first_name'         => 'required|string|max:160',
            'last_name'          => 'required|string|max:160',
            'document_type_id'   => 'required|exists:document_types,id',
            'document_number'    => 'required|max_digits:12|numeric|unique:users,document_number',
            'email'              => 'required|email|max:255|unique:users,email',
            'role_id'            => 'required|exists:roles,id',
            'password'           => 'required|string|min:5|confirmed',
        ]);

        // Crear el usuario
        User::create([
            'name'       => $validatedData['first_name'],
            'last_name'        => $validatedData['last_name'],
            'id_document_type' => $validatedData['document_type_id'],
            'document_number'  => (string)$validatedData['document_number'],
            'email'            => $validatedData['email'],
            'id_rol'          => $validatedData['role_id'],
            'password'         => bcrypt($validatedData['password']),
        ]);

        // Send a WireUI notification
        session()->flash('notification', [
            'title'       => 'Usuario Creado',
            'description' => 'El usuario ' . $validatedData['first_name'] . ' se ha creado exitosamente.',
            'icon'        => 'success',
        ]);

        return redirect()->route('admin.users')
            ->with('success', 'User created successfully.');}
}
