<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentsChart extends Component
{
    public $generation;
    public $maxGeneration;
    public $studentCount;

    public function mount()
    {
        $this->maxGeneration = Student::max('generation');
        $this->generation = $this->maxGeneration;
    }

    public function decrement()
    {
        $this->generation = max(1, $this->generation - 1);
        $this->update();
    }

    public function increment()
    {
        $this->generation = min($this->maxGeneration, $this->generation + 1);
        $this->update();
    }

    public function update()
    {
        $this->studentCount = Student::where('generation', $this->generation)
            ->selectRaw('count(*) as count, major')
            ->groupBy('major')
            ->pluck('count', 'major')->toArray();

        $this->dispatch('refresh', $this->studentCount);
    }

    public function render()
    {
        $this->studentCount = Student::where('generation', $this->generation)
            ->selectRaw('count(*) as count, major')
            ->groupBy('major')
            ->pluck('count', 'major')->toArray();

        return view('livewire.students-chart');
    }
}
