
<div>
    <div>
    <input type="text" wire:model="todo" placeholder="Todo..."> 

    {{-- $wire can be treated like a JavaScript --}}
    <p>Todo character length: 
        <span x-text="$wire.todo.length"></span>
    </p>

    
    <button x-on:click="$wire.todo = ''">Clear 1</button>                   {{-- Client-Side --}}
    <button x-on:click="$wire.set('todo', '')">Clear 2</button>             {{-- triggers a network request and synchronizes to server --}}

    <button wire:click="add">Add Todo</button>

    <ul>
        @foreach ($todos as $todo)
            <li wire:key="{{ $loop->index }}">{{ $todo }}</li>
        @endforeach
    </ul>
</div>

</div>