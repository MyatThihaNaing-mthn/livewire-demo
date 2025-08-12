<div>
    <h1 class=" text-xl font-bold mb-4">Users List</h1>
    <h3>Current User: {{ $currentUser ? $currentUser->name : 'Guest' }}</h3>
    @if (sizeof($users) > 0)
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    @else
        <p>No users found.</p>
    @endif

    @if ($currentUser)
        <div class="flex w-full justify-between mt-4">
            <a href="{{ route('logout') }}" class="text-blue-600 hover:underline">Logout</a>
            @if ($currentUser && $currentUser->id === 1)
            <a href="{{ route('users.create') }}" class="text-blue-600 hover:underline">Create User</a>
            @endif
        </div>
    @endif

    
</div>
