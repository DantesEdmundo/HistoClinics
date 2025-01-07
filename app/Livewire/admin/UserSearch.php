<?php

namespace App\Livewire\admin;

use Livewire\Component;
use App\Models\User;

class UserSearch extends Component
{
    public $search = ''; // Variable para capturar el texto de búsqueda

    public function render()
    {
        $usersAll = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%')
            ->with(['rol', 'document_type']) // Asegúrate de cargar relaciones necesarias
            ->get();

        return view('livewire.admin.user-search', compact('usersAll'));
    }
}
