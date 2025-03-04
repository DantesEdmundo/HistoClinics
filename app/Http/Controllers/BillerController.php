<?php

namespace App\Http\Controllers;

use App\Models\appointments;
use App\Models\Biller;
use App\Models\patients;
use App\Models\rol;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Validation\Rule;
use Illuminate\View\Concerns\ManagesFragments;


class BillerController extends Controller
{
    public function biller_management()
    {

        $allappointment = appointments::with(['patient'])->paginate(5);


        return view('biller.biller_management', compact('allappointment'));
    }















    public function biller_create()
    {
        $doctorall = User::select('id', 'name')->where('id_rol', 3)->get()->toArray();
        $patientall = patients::select('id', 'name')->get()->toArray();


        return view('biller.create')
            ->with("doctorall", $doctorall)
            ->with("patientall", $patientall);
    }


    public function biller_store(request $request)
    {

        $request->validate([
            'id' => 'required|',
            'id_user' => 'required',
            'date_appointment' => 'required',



        ]);
        $appoinmets = new appointments();
        $appoinmets->id_patient = $request->id;
        $appoinmets->id_doctor = $request->id_user;
        $appoinmets->date_time = $request->date_appointment;
        $appoinmets->status = 'ok';



        $appoinmets->save();

        // Send a WireUI notification
        session()->flash('notification', [
            'title'       => 'Cita Creada',
            'description' => 'Se ha creado la cita correctamente',
            'icon'        => 'success',
        ]);
        return redirect()->route('biller.create')
            ->with('success', 'Appointment created successfully.');
    }

    public function biller_edit(Request $request, appointments $appointments)
    {

        $request->validate([
            'id' => 'required|',
            'id_user' => 'required',
            'date_appointment' => 'required',
        ]);

        $appointments->edit($request->all());


        // Send a WireUI notification
        session()->flash('notification', [
            'title'       => 'Cita editada',
            'description' => 'Se ha editado la cita correctamente',
            'icon'        => 'success',
        ]);
        return redirect()->route('biller.edit')
            ->with('success', 'Appointment edit created successfully.');
    }
}
