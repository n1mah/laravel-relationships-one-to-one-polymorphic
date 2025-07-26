<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
<div class="container">
    <h1>Posts List</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($posts->count())
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>title</th>
                <th>body</th>
                <th>image</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{Str::limit($post->body, 50) }}</td>
                    <td>
                        @if($post->image)
                            <img src="{{ asset('storage/'. $post->image->path) }}" alt="Image" style="max-width: 100px; max-height: 70px;" />
                        @else
                            Without Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Update</a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are U Sure ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Not Exist Posts</p>
    @endif
</div>
</body>
</html>
