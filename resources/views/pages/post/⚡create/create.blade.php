<div>
    <h1>Create Post</h1>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('message') }}
        </div>
    @endif
    
    <form wire:submit="save"> 
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" wire:model.live="title" />
            <div>
                @error('title') 
                    <span class="text-danger">{{ $message }}</span> 
                @enderror 
            </div>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" wire:model.live="body"></textarea>
            <div>
                @error('body') 
                    <span class="text-danger">{{ $message }}</span> 
                @enderror 
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <span wire:loading wire:target="save" class="spinner-border spinner-border-sm me-2" role="status">
                <span class="sr-only"></span>
            </span>

            Save
        </button>
    </form>
</div>