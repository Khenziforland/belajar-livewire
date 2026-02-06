<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

use App\Models\User;

new class extends Component
{
    use WithFileUploads, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name = '';
    public $email = '';
    public $password = '';
    public $avatar = null;

    public function addUser()
    {
        $validated = $this->validate([ 
            'name' => 'required|min:3',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:3',
            'avatar' => 'nullable|image|max:1000',
        ]);
        
        // Upload avatar if exists
        if($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatars', 'public');
        }

        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'avatar' => $validated['avatar'],
        ]);

        $this->reset(['name', 'email', 'password', 'avatar']);

        session()->flash('success', 'User successfully added.');
    }

    public function mount()
    {
        
    }
};
?>

<div class="container w-50 mx-auto my-5">
    <h2 class="fw-semibold text-center">Add User</h2>

    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="addUser" action="#" method="POST">
        <div class="form-group">
            <label for="name">Nama</label>
            <input wire:model="name" type="text" class="form-control" id="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input wire:model="email" type="email" class="form-control" id="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input wire:model="password" type="password" class="form-control" id="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="avatar">Profile Picture</label>
            <input wire:model="avatar" type="file" class="form-control" id="avatar" accept="image/png, image/jpg, image/jpeg,">
            @error('avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div wire:loading wire:target="avatar" class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div>

            @if ($avatar)
                <p class="my-2 small fw-medium">Preview:</p>
                <img src="{{ $avatar->temporaryUrl() }}" class="rounded" style="width: 10rem; height: 10rem; object-fit: cover; display: block;">
            @endif
        </div>

        <div class="form-group mt-3">
            <button class="btn btn-primary" wire:loading.attr="disabled">
                <span wire:loading wire:target="addUser" class="spinner-border spinner-border-sm me-2" role="status">
                    <span class="sr-only"></span>
                </span>
                <span wire:loading.remove wire:target="addUser">Add User</span>
                <span wire:loading wire:target="addUser">Processing...</span>
            </button>
        </div>
    </form>

    <hr class="border border-primary border-2">

    <h2 class="fw-semibold">User List</h2>

    @php
        $users = App\Models\User::orderBy('id', 'desc')->paginate(6);
    @endphp

    {{-- List of All User --}}
    <div class="list-group">
        @foreach ($users as $user)
            <button type="button" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('img/default-avatar.jpg') }}" class="rounded-circle me-3" width="50" height="50">
                    <div class="d-flex flex-column">
                        <span class="fw-medium">{{ $user->name }}</span>
                        <span class="text-muted small">{{ $user->email }}</span>
                    </div>
                </div>

                <span class="text-muted small">Joined {{ $user->created_at->diffForHumans() }}</span>
            </button>
        @endforeach

        {{ $users->links() }}
    </div>


</div>