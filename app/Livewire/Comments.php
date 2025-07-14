<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public $post;
    public $name;
    public $text;

    public function store()
    {
        $this->validate([
            'text' => 'required',
        ]);

        $this->post->comments()->create([
            'name' => $this->name,
            'text' => $this->text,
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
    }

    public function mount(News $post)
    {
        $this->post = $post;
        if (Auth::check()) {
            $this->name = Auth::user()->name;
        }
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->post->comments()->latest()->get(),
        ]);
    }
}
