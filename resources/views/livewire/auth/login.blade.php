<div>
    <h2>Welcome back</h2>
    <form wire:submit='login'>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model='email' required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" wire:model='password' required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Login</button>
        <div>
    </form>
</div>
