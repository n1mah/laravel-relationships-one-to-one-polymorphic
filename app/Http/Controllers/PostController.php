<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\ImageService;

class PostController extends Controller
{
    public function __construct(protected ImageService $imageService){}
    public function index()
    {
        $posts = Post::with('image')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->only(['title', 'body']));
        if ($request->hasFile('image'))
            $this->imageService->uploadImage($request->file('image'), $post);
        return redirect()->route('posts.index');
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        if ($request->hasFile('image')) {
            $this->imageService->uploadImage($request->file('image'), $post);
        }
        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function attach_image_test(Post $post)
    {
        $post = $post->find(1);
        $post->image()->create([
            'path'=>'/images/posts/1.jpg'
        ]);
        return $post;
    }
    public function attach_image_test_get(Post $post)
    {
        $post = $post->find(1);
        return $post->image;
    }

}
