<div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
    <h2 class="mb-6 text-2xl font-bold text-center text-red-800">Welcome back</h2>
    <form wire:submit='login' class="flex flex-col gap-4">
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email:</label>
            <input type="email" id="email" wire:model='email' required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')
                <span class="block mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password:</label>
            <input type="password" id="password" wire:model='password' required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password')
                <span class="block mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700 transition">Login</button>
    </form>
</div>