<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center">
            <x-mini-button href="{{route('admin.users')}}" rounded icon="arrow-left" flat gray interaction:solid />
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-2">
                {{__('Editar usuario')}}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form method="POST" action="{{route('admin.create_user.post')}}">
                    @csrf
                    <div class="flex flex-row justify-between flex-wrap">
                        <x-input name="first_name" type="text" class="!w-1/2 p-2" label="Nombres"
                            placeholder="Tus nombres" value="{{$user->name}}" disabled />
                        <x-input name="last_name" type="text" class="!w-1/2 p-2" label="Apellidos"
                            placeholder="Tus apellidos" value="{{$user->last_name}}" disabled />
                        <x-select name="document_id" class="!w-1/2 p-2" label="Tipo de documento"
                            placeholder="Selecciona un tipo de documento" :options="$document_types" option-label="name"
                            option-value="id" clearable="{{false}}" value="2" />
                        <x-input name="document_number" type="number" class="!w-1/2 p-2" label="Número de documento"
                            placeholder="Tu número de documento" value="{{$user->document_number}}" disabled />
                        <x-input name="email" type="email" class="!w-1/2 p-2" label="Email" placeholder="Tu email"
                            value="{{$user->email}}" />
                        <x-select name="role_id" class="!w-1/2 p-2" label="Rol" placeholder="Selecciona un rol"
                            :options="$roles" option-label="name" option-value="id" clearable="{{false}}" />
                        <x-password name="password" class="!w-1/2 p-2" label="Contraseña" />
                        <x-password name="password_confirmation" class="!w-1/2 p-2" label="Repite tu contraseña" />
                        <x-button type="submit" class="m-2 mt-8" label="Guardar cambios" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>