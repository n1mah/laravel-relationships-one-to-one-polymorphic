<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <div class="container">
        <h1>Users List</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New User</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        @if($user->image)
                            <img src="{{ asset('storage/' . $user->image->path) }}" alt="User Image" width="50" height="50" class="rounded-circle">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No users found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
