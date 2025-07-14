<?php

namespace App\Livewire;

use App\Models\News as ModelsNews;
use Livewire\Component;

class News extends Component
{
    public $search;
    public $category= 'all';
    public $news;

    public function render()
    {
        if ($this->category== 'all') {
            $this->news = ModelsNews::where('title', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->news = ModelsNews::where('category', $this->category)->where('title', 'like', '%' . $this->search . '%')->get();
        }
        return view('livewire.news', [
            'news' => $this->news
        ]);
    }
}
