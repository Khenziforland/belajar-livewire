<?php

use App\Models\Post;
use Livewire\Component;

new class extends Component
{
    public Post $post;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
    }
};