<?php

namespace App\Livewire;

use App\Models\Visitor;
use Livewire\Component;

class VisitorsChart extends Component
{
    public $date;
    public $data;

    public function mount()
    {
        $this->date = date('Y-m-d');
    }

    public function render()
    {
        $this->data = Visitor::whereBetween('date', [
            now()->subDays(7)->toDateString(), // 7 hari yang lalu
            now()->toDateString()              // Hari ini
        ])
            ->latest()
            ->limit(8)
            ->get()
            ->pluck('count')
            ->toArray();

        return view('livewire.visitors-chart');
    }
}
