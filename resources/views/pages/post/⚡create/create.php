<?php

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Validate;

new class extends Component
{
    #[Validate('required|min:5')]
    public $title = '';

    #[Validate('required|min:5')]
    public $body = '';

    public function save()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        // $this->reset();
        $this->reset(['title', 'body']);

        session()->flash('message', 'Post created successfully!');

        // return redirect()->to('/posts');
    }
};
