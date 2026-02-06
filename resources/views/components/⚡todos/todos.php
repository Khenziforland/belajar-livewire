<?php

use Livewire\Component;

new class extends Component
{
    // Primitive types
    public array $todos = [];
    public string $todo = '';
    public int $maxTodos = 10;
    public bool $showTodos = false;
    public ?string $todoFilter = null;

    public function add()
    {
        // $this->todos[] = $this->todo;
        // $this->reset('todo');

        $this->todos[] = $this->pull('todo');
    }

    public function mount()
    {
        $this->todos = ['Buy groceries', 'Walk the dog', 'Write code'];
    }
};