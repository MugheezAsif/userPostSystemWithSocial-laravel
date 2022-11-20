<?php

namespace App\Http\Controllers;

use App\Models\User;
use Multicaret\Acquaintances\Traits\CanFollow;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // profile page
    public function profile (User $user) {
    
        return view('users.profile', [
            'user' => $user
        ]);
    }

    // follow a user
    public function follow (User $user) {
        $current_user = auth()->user();
        $current_user->follow($user);
        return back();
    }

    // unfollow a user
    public function unfollow (User $user) {
        $current_user = auth()->user();
        $current_user->unfollow($user);
        return back();
    }

    // friend request send
    public function request (User $user) {
        auth()->user()->befriend($user);
        return back();
    }

    // unfriend
    public function unfriend (User $user) {
        auth()->user()->unfriend($user);
        return back();
    }

    // accept request
    public function accept (User $user) {
        auth()->user()->acceptFriendRequest($user);
        return back();
    }
}
