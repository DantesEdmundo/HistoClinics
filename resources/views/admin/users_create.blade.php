<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear usuario') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form method="POST" action="{{ route('admin.create_user.post') }}">
                    @csrf
                    <div class="flex flex-row justify-between flex-wrap">
                        <x-input name="first_name" type="text" class="!w-1/2 p-2" label="Nombres" placeholder="Tus nombres" value="{{$fakeData['first_name']}}"/>
                        <x-input name="last_name" type="text" class="!w-1/2 p-2" label="Apellidos" placeholder="Tus apellidos" value="{{$fakeData['last_name']}}"/>
                        <x-select
                            name="document_type_id"
                            class="!w-1/2 p-2"
                            label="Tipo de documento"
                            placeholder="Selecciona un tipo de documento"
                            :options="$document_types"
                            option-label="name"
                            option-value="id"
                        />
                        <x-input name="document_number" type="number" class="!w-1/2 p-2" label="Número de documento" placeholder="Tu número de documento" value="{{$fakeData['document_num']}}"/>
                        <x-input name="email" type="email" class="!w-1/2 p-2" label="Email" placeholder="Tu email" value="{{$fakeData['email']}}"/>
                        <x-select
                            name="role_id"
                            class="!w-1/2 p-2"
                            label="Rol"
                            placeholder="Selecciona un rol"
                            :options="$roles"
                            option-label="name"
                            option-value="id"
                        />
                        <x-password name="password" class="!w-1/2 p-2" label="Contraseña" value="password"/>
                        <x-password name="password_confirmation" class="!w-1/2 p-2" label="Repite tu contraseña" value="password"/>
                        <x-button type="submit" class="m-2 mt-8" label="Crear usuario" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
