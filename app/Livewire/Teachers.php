<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\Teacher;
use Livewire\Component;

class Teachers extends Component
{
    public $search;
    public $role = 'all';
    public $teachers;

    public function render()
    {
        if ($this->role == 'all') {
            $this->teachers = Teacher::with('role')->where('name', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->teachers = Teacher::with('role')->where('role_id', $this->role)->where('name', 'like', '%' . $this->search . '%')->get();
        }

        $roles = Role::all();

        return view('livewire.teachers', [
            'teachers' => $this->teachers,
            'roles' => $roles
        ]);
    }
}
