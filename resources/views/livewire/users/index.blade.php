<div>
    <h1>{{ $message }}</h1>
    <h2>Users List</h2>
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
</div>
