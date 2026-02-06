<div>
    <h1>{{ $title }}</h1>
    <p>API Key: {{ $this->apiKey }}</p>

    <p>Author: {{ $author }}</p>
    <p>Current Time: {{ $currentTime }}</p>

    <p>Total Posts: 
        <span x-init="$el.innerHTML = await $wire.getPostCount()"></span>
    </p>

    <button type="button" wire:click="$refresh">Refresh Page</button>           {{--  using Livewire method --}}
    <button type="button" x-on:click="$wire.$refresh()">...</button>            {{-- using AlpineJS in Livewire --}}

    @foreach ($this->posts as $post)
        <div wire:key="{{ $post->id }}">
            <h1>{{ $post->title }}</h1>
            <span>{{ $post->content }}</span>

            <button 
                type="button"
                wire:click="delete({{ $post->id }})"
                wire:confirm="Are you sure you want to delete this post?">
                Delete
            </button> 
        </div>
    @endforeach
</div>