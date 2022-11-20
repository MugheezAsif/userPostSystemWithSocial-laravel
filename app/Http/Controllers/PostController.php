<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    // index page
    public function index () {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['tag']))->simplepaginate(6)
        ]);
    }

    // show page
    public function show (Post $post) {
        $comments = Comment::all()->where('post_id', $post->id);
        $user = User::find($post->user_id);
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
            'user' => $user
        ]);
    }

    // create page
    public function create () {
        return view('posts.create');
    }

    // store post
    public function store () {
        $formFields = request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'subject' => 'required',
            'tags' => 'required',
            'content' => 'required',
            'user_id' => 'required'
        ]);
        if(request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }
        Post::create($formFields);
        return redirect('/');
    }

    // edit page
    public function edit (Post $post) {
        if (Auth::id() != $post->user_id)
            return back();
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    // update
    public function update (Post $post) {
        $formFields = request()->validate([
            'title' => ['required'],
            'subject' => 'required',
            'tags' => 'required',
            'content' => 'required',
            'user_id' => 'required'
        ]);
        if(request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }
        $post->update($formFields);
        return redirect('/');
    }

    // destroy
    public function delete (Post $post) {
        if (Auth::id() != $post->user_id)
            return back();
        $post->delete();
        return redirect('/');
    }

    // post comment
    public function comment () {
        $formFields = request()->validate([
            'content' => 'required',
            'post_id' => 'required'
        ]);
        Comment::create($formFields);
        return back();
    }

    // all posts page
    public function allPosts () {
         $posts = Post::latest()->filter(request(['tag']))->get();
        return view('posts.all', [
            'posts' => $posts
        ]);
    }

    // post liked
    public function like (Post $post) {
        auth()->user()->like($post);
        return back();
    }

    // post unliked
    public function unlike (Post $post) {
        auth()->user()->unlike($post);
        return back();
    }

    // add to favourite a post
    public function fav (Post $post) {
        auth()->user()->favorite($post);
        return back();
    }

    // un favourite a post
    public function unfav (Post $post) {
        auth()->user()->unfavorite($post);
        return back();
    }
}
