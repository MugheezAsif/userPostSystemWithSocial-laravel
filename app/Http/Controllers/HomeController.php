<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$favPosts = auth()->user()->favorites()->get();
        $pendingfriends = auth()->user()->getFriendRequests();
        $friends = auth()->user()->getAcceptedFriendships();
        $posts = Post::latest()->filter(request(['tag']))->get();
        return view('home', [
            'posts' => $posts,
            'pendingFriends' => $pendingfriends,
            'friends' => $friends
            //'favPosts' => $favPosts

        ]);
    }
}
