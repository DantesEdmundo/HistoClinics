<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center">
            <x-mini-button href="{{route('biller.management')}}" rounded icon="arrow-left" flat gray
                interaction:solid />
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-2">
                {{ __('Gestion de Citas') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800  shadow-sm sm:rounded-lg p-8">

                <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 uppercase text-sm font-semibold">
                            <th class="px-6 py-3 text-left">Nombre del Paciente</th>
                            <th class="px-6 py-3 text-left">Nombre del Médico</th>
                            <th class="px-6 py-3 text-left">Fecha y Hora</th>
                            <th class="px-6 py-3 text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allappointment as $appointment)
                            <tr class="border-b hover:bg-gray-100 transition duration-200">
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $appointment->patient->name }} {{ $appointment->patient->last_name }}
                                </td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $appointment->doctor->name }}
                                    <p class="text-sm text-gray-500">({{ $appointment->doctor->rol->name }})</p>
                                </td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $appointment->date_time }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('biller.edit', ['appointments' => $appointment->id]) }}">
                                        <x-button positive label="Editar" />
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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    @livewireScripts

</x-app-layout>