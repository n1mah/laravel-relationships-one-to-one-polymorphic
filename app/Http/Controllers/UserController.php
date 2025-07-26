<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected ImageService $imageService){}
    public function index()
    {
        $users = User::with('image')->latest()->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        $user = User::create($data);
        if ($request->hasFile('image'))
            $this->imageService->uploadImage($request->file('image'), $user);
        return redirect()->route('users.show', $user);
    }


    public function show(User $user)
    {
        $user->load('image');
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only(['name', 'email']);
        if ($request->filled('password'))
            $data['password'] = $request->input('password');
        $user->update($data);
        if ($request->hasFile('image'))
            $this->imageService->uploadImage($request->file('image'), $user);
        return redirect()->route('users.show', $user);
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
