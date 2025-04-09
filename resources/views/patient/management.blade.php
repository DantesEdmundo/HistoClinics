<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center">
            <x-mini-button href="{{route('patient.management')}}" rounded icon="arrow-left" flat gray
                interaction:solid />
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-2">
                {{ __('Gestion de Pacientes') }}
            </h2>
            <div class="ml-auto">
                <x-button class="px-6 py-3" href="{{route('patient.create')}}" rounded="md" positive
                    label="Crear Usuario" />
            </div>
        </div>
    </x-slot>
    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800  shadow-sm sm:rounded-lg p-8">

                <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">

                    <thead>
                        <tr class="bg-gray-200 text-gray-700 uppercase text-sm font-semibold">
                            <th class="px-6 py-3 text-left">Nombre del Paciente</th>
                            <th class="px-6 py-3 text-left">Numero de Documento</th>
                            <th class="px-6 py-3 text-left">EPS</th>
                            <th class="px-6 py-3 text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allpatients as $patient)
                            <tr class="border-b">
                                <td class="px-6 py-4">{{ $patient->name }} {{ $patient->last_name }}</td>
                                <td class="px-6 py-4">{{ $patient->document_number }}</td>
                                <td class="px-6 py-4">{{ $patient->eps->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-center">

                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('patient.edit', $patient->id) }}">
                                        <x-button positive label="Editar" />

                                    </a>
                                    <a href="{{ route('patient.delete', $patient->id) }}" method="POST"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta cita?');">
                                        @csrf

                                        <x-button negative label="Eliminar" />


                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <x-notifications />
</x-app-layout>