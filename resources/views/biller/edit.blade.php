<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center">
            <x-mini-button href="{{route('biller.edit')}}" rounded icon="arrow-left" flat gray interaction:solid />
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-2">
                {{ __('editar Citas') }}
            </h2>
        </div>

        <form method="POST" action="{{ route('biller.update', $appointments) }}">
            @csrf
            @method('PUT')
            <div class="flex flex-row justify-between flex-wrap">

                <x-select name="id_user" class="!w-1/2 p-2" label="Nombre del Medico" placeholder="Selecciona un Medico"
                    :options="$doctorall" option-label="name" />

                <x-select name="id" class="!w-1/2 p-2" label="Nombre del Paciente" placeholder="Selecciona un Paciente"
                    :options="$patientall" option-label="name" option-value="id"
                    value="{{ $appointments->patient->name }} {{ $appointments->patient->last_name }}" />

                <x-datetime-picker name='date_appointment' label="Seleccione fecha y hora"
                    placeholder="Seleccione fecha y hora" value="{{ $appointments->date_time }}" />

                <x-button type="submit" class="m-2 mt-8" label="Editar Cita" />
            </div>
        </form>
        </div>
        </div>
        </div>
        <x-notifications />
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
        @livewireScripts

</x-app-layout>