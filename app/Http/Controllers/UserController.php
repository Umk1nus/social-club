<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Http\Resources\User\UserResource;
use App\Models\SubscriberFollowing;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::whereNot('id', auth()->id())->get();

        $following = SubscriberFollowing::where('subscriber_id', auth()->id())
        ->get('following_id')->pluck('following_id')->toArray();

        foreach ($users as $user) {
            if(in_array($user->id, $following)) {
                $user->is_followed = true;
            }
        }

        return UserResource::collection($users);
    }

    public function user(User $user) {
        return $user;
    }

    public function post(User $user) {
        return PostResource::collection($user->posts);
    }

    public function following(User $user) {
        return auth()->user()->follow()->toggle($user->id);
    }
}
