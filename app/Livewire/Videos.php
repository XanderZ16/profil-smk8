<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;

class Videos extends Component
{
    public $search;
    public $category = 'all';
    public $videos;

    public function render()
    {
        if ($this->category== 'all') {
            $this->videos = Video::where('title', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->videos = Video::where('category', $this->category)->where('title', 'like', '%' . $this->search . '%')->get();
        }
        return view('livewire.videos', [
            'videos' => $this->videos
        ]);
    }
}
