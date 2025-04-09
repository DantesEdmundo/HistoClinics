<?php

namespace App\Http\Controllers;

use App\Models\appointments;
use App\Models\document_type;
use App\Models\eps;
use App\Models\patients;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class PatientController extends Controller
{

    public function management()
    {
        $allpatients = patients::with('eps')->get(); // los paciente xd
        return view('patient.management', compact('allpatients'));
    }


    public function patient_create()
    {
        $alldocument = document_type::select('id', 'name', 'abreviature')->get()->toArray();
        $alleps = eps::select('id', 'name', 'id_document_type', 'id_number')->get()->toArray();

        return view('patient.create')
            ->with("alldocument", $alldocument)
            ->with("alleps", $alleps);
    }

    public function patient_store(request $request)
    {

        $request->validate([

            'name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'birthdate' => 'required',
            'id_document_type' => 'required|exists:document_types,id',
            'id_eps' => 'required|exists:eps,id',
            'document_number' => 'required|max_digits:12|numeric',
            'address' => 'required|',
            'phone' => 'required|max_digits:12',


        ]);


        $patients = new patients();
        $patients->name = $request->name;
        $patients->last_name = $request->last_name;
        $patients->birthdate = $request->birthdate;
        $patients->id_document_type = $request->id_document_type;
        $patients->id_eps = $request->id_eps;
        $patients->document_number = $request->document_number;
        $patients->address = $request->address;
        $patients->phone = $request->phone;


        $patients->save();

        // Send a WireUI notification
        session()->flash('notification', [
            'title'       => 'Usuario Creado',
            'description' => 'Se ha creado el usuario correctamente',
            'icon'        => 'success',
        ]);
        return redirect()->route('patient.create')
            ->with('success', 'patient created successfully.');
    }

    public function edit($id)
    {
        $patient = patients::findOrFail($id);
        $alldocument = document_type::select('id', 'name', 'abreviature')->get();
        $alleps = eps::select('id', 'name')->get();

        return view('patient.edit', compact('patient', 'alldocument', 'alleps'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'id_document_type' => 'required|exists:document_types,id',
            'id_eps' => 'required|exists:eps,id',
            'document_number' => 'required|max_digits:12|numeric',
            'address' => 'required',
            'phone' => 'required|max_digits:12',
        ]);

        $patient = patients::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('patient.management')->with('success', 'Paciente actualizado correctamente.');
    }

    public function delete($id)
    {
        $patient = patients::findOrFail($id);
        $patient->delete();

        return redirect()->route('patient.management')->with('success', 'Paciente eliminado correctamente.');
    }
}
