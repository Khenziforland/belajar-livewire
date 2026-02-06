<?php

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Computed;

new class extends Component
{
    // Component properties
    public $title = 'My Post';           // Available as {{ $title }}
    protected $apiKey = 'secret-key';    // Available as {{ $this->apiKey }}

    // Computed properties
    #[Computed]
    public function posts()
    {
        return Post::latest()->get();
    }

    public function getPostCount()
    {
        return Post::count();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        // $this->authorize('delete', $post);

        $post->delete();
    }

    // Pass data directly to the view using the render() 
    public function render()
    {
        return $this->view([
            'author' => "Rifky",
            'currentTime' => now(),
        ])
            ->layout('layouts::main')       // Use custom layout
            ->title('Create Post');
    }
};
