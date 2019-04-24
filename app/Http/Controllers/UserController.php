<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    public function show($id)
    {
        $posts = Post::all();
        $user = User::find($id);
        return view('users.show')->with('user', $user)->with('posts', $posts);
    }
}
