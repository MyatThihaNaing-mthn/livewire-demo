<div>
    <form wire:submit='save'>
        <div>
            <label for="username">Name:</label>
            <input type="text" id="name" wire:model.blur='username' required>
            @error('username')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model.blur='email' required>
            @error('email')
                <span class="error">{{ $message }}</span>  
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" wire:model.blur='password' required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
</div>
        <div>
            <label for="confirmation_password">Confirm Password:</label>
            <input type="password" id="confirmation_password" wire:model.blur='confirmation_password' required>
            @error('confirmation_password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="roleId">Role:</label>
            <select id="roleId" wire:model='roleId' required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('roleId')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Create User</button>
    </form>
    <script>
    window.addEventListener('log-message', event => {
        console.log('Livewire Log:', event.detail);
    });
</script>
</div>
