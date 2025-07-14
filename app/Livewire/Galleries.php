<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class Galleries extends Component
{
    public $search;
    public $category = 'all';
    public $galleries;

    public function render()
    {
        if ($this->category== 'all') {
            $this->galleries = Gallery::where('title', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->galleries = Gallery::where('category', $this->category)->where('title', 'like', '%' . $this->search . '%')->get();
        }
        return view('livewire.galleries', [
            'galleries' => $this->galleries
        ]);
    }
}
