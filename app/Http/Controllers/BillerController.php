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

        $allappointment = appointments::with(['patient', 'doctor'])->get();
        // dd($allappointment);

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
            'id_patient' => 'required|exists:patients,id',
            'id_doctor' => 'required|exists:users,id',
            'date_appointment' => 'required',
        ]);


        $appoinmets = new appointments();
        $appoinmets->id_patient = $request->id_patient;
        $appoinmets->id_doctor = $request->id_doctor;
        $appoinmets->date_time = $request->date_appointment;
        $appoinmets->status = 'ok';



        $appoinmets->save();

        // Send a WireUI notification
        session()->flash('notification', [
            'title'       => 'Cita Creada',
            'description' => 'Se ha creado la cita correctamente',
            'icon'        => 'success',
        ]);

        // Aquí se debe redirigir a la vista de la lista de citas para una mejor experiencia de usuario
        return redirect()->route('biller.management')
            ->with('success', 'Appointment created successfully.');
    }

    public function biller_edit(Request $request, $appointment_id)
    {


        $appointment = appointments::where('id', $appointment_id)->with(['patient', 'doctor'])->first();
        $doctorall = User::select('id', 'name')->where('id_rol', 3)->get()->toArray();



        return view('biller.edit', compact('appointment', 'doctorall'));
    }

    public function biller_update(Request $request)
    {

        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'id_user' => 'required|exists:users,id',
            'date_appointment' => 'required|date',
        ]);

        $appointment = Appointments::where('id', $request->appointment_id)->first();
        $appointment->id_doctor = $request->id_user;
        $appointment->date_time = $request->date_appointment;
        $appointment->save();

        session()->flash('notification', [
            'title'       => 'Cita Editada',
            'description' => 'Se ha editado la cita correctamente',
            'icon'        => 'success',
        ]);

        return redirect()->route('biller.management')->with('success', 'Appointment updated successfully.');
    }

    public function biller_delete($appointment_id)
    {

        $appointment = appointments::find($appointment_id);


        if ($appointment) {

            $appointment->delete();

            session()->flash('notification', [
                'title'       => 'Cita Eliminada',
                'description' => 'La cita se ha eliminado correctamente',
                'icon'        => 'success',
            ]);
        } else {

            session()->flash('notification', [
                'title'       => 'Error',
                'description' => 'No se pudo encontrar la cita',
                'icon'        => 'error',
            ]);
        }

        return redirect()->route('biller.management');
    }
}
