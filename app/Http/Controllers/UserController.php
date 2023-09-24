<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::whereNot('id', auth()->id())->get();

        return UserResource::collection($users);
    }

    public function user(User $user) {
        return $user;
    }

    public function post(User $user) {
        return PostResource::collection($user->posts);
    }
}
