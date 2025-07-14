<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;

class RolesTable extends Component
{
    public $role;
    public $roles;
    public $originalRoles = [];

    protected $listeners = ['role_created' => '$refresh'];

    /**
     * Create a new role and refresh the list of roles.
     *
     * @return void
     */
    public function store()
    {
        $this->validate([
            'role' => 'required'
        ]);

        Role::create([
            'name' => $this->role
        ]);

        $this->role = '';

        $this->dispatch('role_created');
    }

    public function resetRole($id)
    {
        // Kembalikan nilai ke nilai awal dari $originalRoles
        $this->roles[$id]['name'] = $this->originalRoles[$id]['name'];
    }

    public function update($id)
    {
        // Validasi dan simpan perubahan ke database
        $this->validate([
            "roles.$id.name" => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($this->roles[$id]['id']);
        $role->name = $this->roles[$id]['name'];
        $role->save();

        // Update originalRoles setelah data disimpan
        $this->originalRoles[$id] = $this->roles[$id];
    }

    public function destroy(Role $role)
    {
        $role->delete();

        $this->dispatch('role_destroyed');
    }

    public function render()
    {
        $this->roles = Role::all()->toArray();
        $this->originalRoles = $this->roles;
        return view('livewire.roles-table');
    }
}
