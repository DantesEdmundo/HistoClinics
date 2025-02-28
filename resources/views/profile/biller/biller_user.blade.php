@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Pestañas -->
            <ul class="nav nav-tabs" id="scheduleTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="patients-with-appointments-tab" data-bs-toggle="tab"
                        href="#patients-with-appointments" role="tab" aria-controls="patients-with-appointments"
                        aria-selected="true">Pacientes con Citas</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="all-patients-tab" data-bs-toggle="tab" href="#all-patients" role="tab"
                        aria-controls="all-patients" aria-selected="false">Lista de Pacientes</a>
                </li>
            </ul>

            <div class="tab-content" id="scheduleTabsContent">
                <!-- Pacientes con citas -->
                <div class="tab-pane fade show active" id="patients-with-appointments" role="tabpanel"
                    aria-labelledby="patients-with-appointments-tab">
                    <h3>Pacientes con Citas</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de Cita</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->patient->name }}</td>
                                    <td>{{ $appointment->date->format('d/m/Y') }}</td>
                                    <td>{{ $appointment->time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Lista de pacientes -->
                <div class="tab-pane fade" id="all-patients" role="tabpanel" aria-labelledby="all-patients-tab">
                    <h3>Lista de Pacientes</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->age }}</td>
                                    <td>{{ $patient->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection