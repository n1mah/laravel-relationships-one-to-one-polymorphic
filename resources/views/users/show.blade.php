<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show User</title>
</head>
<body>
<div class="container">
    <h1>User Details</h1>

    @if($user->image)
        <img src="{{ asset('storage/' . $user->image->path) }}" alt="User Image" width="150" height="150" class="rounded-circle mb-3">
    @endif

    <ul class="list-group">
        <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
    </ul>

    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
</body>
</html>
