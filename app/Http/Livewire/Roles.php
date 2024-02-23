<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $roles;
    public function render()
    {
        $roles = Role::all();
        return view('livewire.roles', compact('roles'));
    }
}
