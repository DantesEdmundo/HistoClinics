<?php

namespace App\Http\Controllers;

use App\Models\appointments;
use App\Models\patients;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class AppointmentController extends Controller
{

    public function create()
    {
        return view('appointments.create');
    }


    public function showschedule()
    {
        // Obtener los pacientes con citas
        $appointments = appointments::with('patient')->where('date', '>=', now())->get();

        // Obtener todos los pacientes
        $patients = Patients::all();

        return view('biller.biller_user', compact('appointments', 'patients'));
    }
}
