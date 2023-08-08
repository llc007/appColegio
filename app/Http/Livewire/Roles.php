<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{

    public $roles;

    public function render()
    {
        $this->roles = Role::all();
        return view('livewire.roles', ['roles' => $this->roles]);
    }
}
