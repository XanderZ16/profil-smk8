<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    public $generation;
    public $major = 'all';
    public $search = '';

    public $maxGeneration = 0;

    public function mount()
    {
        $this->maxGeneration = Student::max('generation');
        $this->generation = $this->maxGeneration;
    }

    public function render()
    {
        $query = Student::where('name', 'like', '%' . $this->search . '%')
            ->where('generation', $this->generation);

        if ($this->major != 'all') {
            $query->where('major', $this->major);
        }

        $students = $query->paginate(40);

        return view('livewire.students', [
            'students' => $students,
            'maxGeneration' => $this->maxGeneration,
        ]);
    }

    public function destroyAll()
    {
        $query = Student::where('name', 'like', '%' . $this->search . '%')
            ->where('generation', $this->generation);

        if ($this->major != 'all') {
            $query->where('major', $this->major);
        }

        $query->delete();
    }
}
