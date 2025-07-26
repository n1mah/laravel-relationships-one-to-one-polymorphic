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
    <h2 class="text-2xl font-bold mb-4">{{$post->title}}</h2>
    @if($post->image)
    <div class="mb-3">
        <img src="{{ asset('storage/'. $post->image->path) }}" alt="تصویر پست" style="max-width: 400px;">
    </div>
    @endif
    <p>{{ $post->body }}</p>
    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">ویرایش</a>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">بازگشت به لیست</a>
</div>
</body>
</html>
