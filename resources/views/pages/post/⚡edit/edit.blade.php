
<div>
    <h1>Edit Post</h1>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" wire:model="title" />
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" wire:model="body"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form> 
</div>