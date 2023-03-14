<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentService {

    public static function saveComment(Request $request) {
        $comment = new Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->post_id = $request->postId;
        $comment->message = $request->message;

        return $comment->save();
    }
}
