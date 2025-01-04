<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion de usuarios') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex flex-row justify-between">
                    <div class="w-2/5">
                        <x-input placeholder="Busca por nombre o apellido">
                            <x-slot name="append">
                                <x-button
                                    class="h-full"
                                    icon="magnifying-glass"
                                    rounded="rounded-r-md"
                                    primary
                                    flat
                                />
                            </x-slot>
                        </x-input>
                    </div>
                    <div class="w-auto">
                        <x-button href="{{route('admin.create_user.view')}}" right-icon="plus" positive label="Crear usuario" />
                    </div>
                </div>
                <div class="flex flex-col mt-6 gap-4">
                    @foreach ($users as $user)
                    <div class="flex flex-row gap-x-2 bg-white shadow rounded-lg p-4 border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex flex-row items-center justify-start gap-x-6 w-3/4">
                                <x-icon name="user" class="w-5 h-5" solid />
                                <p class="text-xl">{{$user->name}} {{$user->last_name}}</p>
                                <p class="text-sm">{{$user->rol->name}}</p>
                                <p class="text-sm">{{$user->document_type->abreviature}}</p>
                            </div>
                            <div class="w-1/4 flex justify-end">
                                <x-button right-icon="pencil" outline primary label="Editar" />
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
