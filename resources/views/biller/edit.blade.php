<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center">
            <x-mini-button href="{{route('biller.management')}}" rounded icon="arrow-left" flat gray
                interaction:solid />
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-2">
                {{ __('Editar Citas') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800  shadow-sm sm:rounded-lg p-8">
                <form method="POST" action="{{ route('biller.update') }}">
                    @csrf

                    <div class="flex flex-row justify-between flex-wrap">

                        <input type="hidden" value={{$appointment->id}} name="appointment_id" />

                        <x-input label="Nombre de paciente"
                            value="{{ $appointment->patient->name }} {{ $appointment->patient->last_name }}" disabled />

                        <x-select name="id_user" class="!w-1/2 p-2" label="Nombre del Medico"
                            placeholder="Selecciona un Medico" :options="$doctorall" option-label="name"
                            option-value="id" />


                        <x-datetime-picker name='date_appointment' label="Seleccione fecha y hora"
                            placeholder="Seleccione fecha y hora" />

                        <x-button type="submit" class="m-2 mt-8" label="Editar Cita" />
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>