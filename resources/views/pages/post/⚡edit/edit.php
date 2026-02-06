<?php

use App\Models\Post;
use Livewire\Attributes\Locked;
use Livewire\Component;


new class extends Component
{
    public Post $post;
    public $title;
    public $body;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->body = $post->body;
    }

    public function update()
    {
        $this->post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        session()->flash('message', 'Post updated successfully!');
    }
};
