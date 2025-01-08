<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
            <div class="flex flex-row justify-between">
                <div class="w-2/5">
                    <input
                        type="text"
                        wire:model.live.debounce.500="search"
                        placeholder="Busca por nombre o apellido"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300"
                    />
                </div>
                <div class="w-auto">
                    <x-button href="{{route('admin.create_user.view')}}" right-icon="plus" info label="Crear usuario" />
                </div>
            </div>
            <div class="flex flex-col mt-6 gap-4">

                @if ($search != '' && $usersAll->isEmpty())
                    <p class="mt-12 mb-12 text-xl text-center">No hay coincidencias</p>
                @endif

                @foreach ($usersAll as $user)
                <div class="flex flex-row gap-x-2 bg-white shadow rounded-lg px-4 py-1 border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-row items-center justify-start gap-x-6 w-3/4">
                        <img class="w-8" src="{{ Vite::asset('resources/img/user.png') }}" alt="user Image">
                        <div class="flex flex-col">
                            <p class="text-xl">{{$user->name}} {{$user->last_name}}</p>
                            <p class="text-sm">{{$user->rol->name}}</p>
                            <p class="text-sm">{{$user->document_type->abreviature}} {{$user->document_number}}</p>
                        </div>
                    </div>
                    <div class="w-1/4 flex justify-end items-center">
                        <x-button class="h-10" right-icon="pencil" outline secondary label="Editar" href="{{route('admin.edit_user.view', ['userId' => $user->id])}}" />
                    </div>
                </div>
                @endforeach

                <div class="mt-6 flex justify-center">
                    {{ $usersAll->links('pagination::tailwind') }}
                </div>

            </div>
        </div>
    </div>
</div>
