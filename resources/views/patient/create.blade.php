<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center">
            <x-mini-button href="{{route('patient.management')}}" rounded icon="arrow-left" flat gray
                interaction:solid />
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-2">
                {{ __('Crear Usuario') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800  shadow-sm sm:rounded-lg p-8">
                <form method="POST" action="{{ route('patient.store') }}">
                    @csrf
                    <div class="flex flex-row justify-between flex-wrap">

                        <x-input icon="user" name="name" label="Nombres" placeholder="Nombres" />

                        <x-input icon="user" name="last_name" label="Apellidos" placeholder="Apellidos" />

                        <x-datetime-picker wire:model.live="model6" name="birthdate" label="Fecha de nacimiento"
                            placeholder="Fecha de nacimiento" without-time />

                        <x-input name="document_number" label="Número de Documento"
                            value="{{ $patient->document_number }}" />
                        <x-select name="id_document_type" class="!w-1/2 p-2" label="Tipo de Documento"
                            placeholder="Seleccione el tipo" :options="$alldocument" option-label="name"
                            option-value="id" />

                        <x-select name="id_eps" class="!w-1/2 p-2" label="Seleccione EPS" placeholder="Seleccione EPS"
                            :options="$alleps" option-label="name" option-value="id" />

                        <x-input icon="user" name="document_number" label="Numero de Documento"
                            placeholder="Numero de Documento" />

                        <x-input icon="home" name="address" label="Dirreccion" placeholder="Dirrecion" />

                        <x-input icon="user" name="phone" label="Telefono" placeholder="Telefono" />

                        <x-button type="submit" class="m-2 mt-8" label="Crear Usuario" />

                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-notifications />
</x-app-layout>