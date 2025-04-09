<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-mini-button href="{{ route('patient.management') }}" icon="arrow-left" rounded flat gray
                interaction:solid />
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight ml-2">
                {{ __('Editar Paciente') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-8">
                <form method="POST" action="{{ route('patient.update', $patient->id) }}">
                    @csrf
                    <div class="flex flex-row justify-between flex-wrap">

                        <x-input icon="user" name="name" label="Nombres" value="{{ old('name', $patient->name) }}" />

                        <x-input icon="user" name="last_name" label="Apellidos" value="{{ $patient->last_name }}" />

                        <x-datetime-picker name="birthdate" label="Fecha de nacimiento" :value="$patient->birthdate"
                            without-time />

                        <x-select name="id_document_type" label="Tipo de Documento" :options="$alldocument"
                            option-label="name" option-value="id" :selected="$patient->id_document_type" />

                        <x-select name="id_eps" label="EPS" :options="$alleps" option-label="name" option-value="id"
                            :selected="$patient->id_eps" />

                        <x-input name="document_number" label="Número de Documento"
                            value="{{ $patient->document_number }}" />

                        <x-input icon="home" name="address" label="Dirección" value="{{ $patient->address }}" />

                        <x-input icon="phone" name="phone" label="Teléfono" value="{{ $patient->phone }}" />

                        <x-button type="submit" class="m-2 mt-8" label="Actualizar Paciente" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>