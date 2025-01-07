<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion de usuarios') }}
        </h2>
    </x-slot>

    <livewire:admin.user-search />

</x-app-layout>
