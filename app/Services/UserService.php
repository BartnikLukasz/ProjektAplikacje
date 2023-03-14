<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserService {

    public static function compactForShow($id) {
        $user = User::find($id);
        $posts = Post::orderBy('created_at', 'asc')->get();
        $images = $user->images()->get();

        return compact('user','posts', 'images');
    }
}
