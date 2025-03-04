<x-button label="Open" x-on:click="$openModal{{'$appointments->id'}}" primary />
<x-modal name="persistentModal" persistent>
    <x-card title="Consent Terms">
        <p>
        <form method="POST" action="{{ route('biller.edit', $appointments) }}">
            @csrf
            @method('PUT')
            <div class="flex flex-row justify-between flex-wrap">

                <x-select name="id_user" class="!w-1/2 p-2" label="Nombre del Medico" placeholder="Selecciona un Medico"
                    :options="$doctorall" option-label="name" option-value="id" />

                <x-select name="id" class="!w-1/2 p-2" label="Nombre del Paciente" placeholder="Selecciona un Paciente"
                    :options="$patientall" option-label="name" option-value="id" />

                <x-datetime-picker name='date_appointment' label="Seleccione fecha y hora"
                    placeholder="Seleccione fecha y hora" />

                <x-button type="submit" class="m-2 mt-8" label="Crear Cita" />


            </div>
        </form>
        </p>

        <x-slot name="footer" class="flex justify-end gap-x-4">
            <x-button flat label="Cancel" x-on:click="close" />

            <x-button primary label="I Agree" wire:click="agree" />
        </x-slot>
    </x-card>
</x-modal>