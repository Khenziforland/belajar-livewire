
<div>
    <h1>{{ $post->title }}</h1>

    <p>{{ $post->body }}</p>

    {{-- Call Component --}}
    <livewire:todos />
</div>