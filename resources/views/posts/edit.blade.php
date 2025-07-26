<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Create</title>
</head>
<body>
<div class="max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Edit Post</h2>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block font-medium">Title</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-2" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="body" class="block font-medium">Body</label>
            <textarea name="body" id="body" class="w-full border rounded p-2" rows="5">{{ old('body', $post->body) }}</textarea>
        </div>

        <div class="mb-4">
            @if($post->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->image->path) }}" alt="Image" style="max-width: 200px;">
                </div>
            @endif
                <label for="image" class="block font-medium">Image (optional)</label>
                <input type="file" name="image" id="image" class="w-full">
                <small class="form-text text-muted">If Select Image , Replace Old Image.</small>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
</body>
</html>
