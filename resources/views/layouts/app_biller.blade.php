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

            </div>
        </div>
    </div>
    <x-notifications />
</x-app-layout>