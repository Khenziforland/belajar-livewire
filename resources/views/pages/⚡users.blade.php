<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

use App\Models\User;

new class extends Component
{
    use WithFileUploads;

    public $name = '';
    public $email = '';
    public $password = '';
    public $avatar = null;

    public $users;

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

        $this->users = User::orderBy('id', 'desc')->get();

        $this->reset(['name', 'email', 'password', 'avatar']);

        session()->flash('success', 'User successfully added.');
    }

    public function mount()
    {
        $this->users = User::orderBy('id', 'desc')->get();
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

            {{-- @if ($avatar)
                <img src="{{ $avatar->temporaryUrl() }}" class="img-fluid mt-3">
            @endif --}}
        </div>

        <div class="form-group mt-3">
            <button class="btn btn-primary">Add User</button>
        </div>
    </form>

    <hr class="border border-primary border-2">

    <h2 class="fw-semibold">User List</h2>
    <ul class="list-group ">
        @foreach ($users as $user)
            <li class="list-group-item">{{ $user->name }}</li>
        @endforeach
    </ul>


</div>