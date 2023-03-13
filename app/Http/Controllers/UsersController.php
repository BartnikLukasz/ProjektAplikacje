<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Description;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::orderBy('created_at', 'asc')->get();
        $images = $user->images()->get();
        return view('user', compact('user','posts', 'images'));
    }

}
