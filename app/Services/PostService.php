<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Services\ImageService;

class PostService {

    public static function compactForIndex() {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return compact('posts', 'users');
    }

    public static function compactForCreate() {
        $post = new Post();
        return compact('post');
    }

    public static function savePost(PostRequest $request) {
        $validated = $request->validate([
            'content' => 'required|min:100|max:10000',
            'contentPreview' => 'min:10|max:250',
            ]);
            session_start();
            $post = new Post();
            $post->user_id = \Auth::user()->id;
            $post->title = $request->title;
            $post->content_preview = $request->contentPreview;
            $post->content = PostService::sanitize($request->content);
            if($post->save()) {
                return $post;
            }
            return false;
    }

    public static function compactForShow($id) {
        $post = Post::find($id);
        $images = $post->images()->get();
        $comments = $post->comments()->get();
        $userIds = collect(['']);
        foreach($comments as $comment) {
            $userIds->push($comment->user_id);
        }
        $users = User::whereIn('id', $userIds)->get();

        return compact('post', 'images', 'comments', 'users');
    }

    public static function compactForEdit($id) {
        $post = Post::find($id);
        if (\Auth::user()->id != $post->user_id) {
            return false;
        }
        return compact('post');
    }

    public static function updatePost(Request $request, $id) {
        $post = Post::find($id);
        if(\Auth::user()->id != $post->user_id){
            return false;
        }
        $post->content = PostService::sanitize($request->content);

        return $post->save();
    }

    public static function deletePost($post) {
        $images = $post->images()->get();
        if($post->delete()) {
            ImageService::deleteImages($images);
            return true;
        }
        return false;
    }

    private static function sanitize($content) {
        $SCRIPT_REGEX = '/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i';
        $SCRIPT_REGEX_SANITIZED = '/&lt;script.*&lt;\/script&gt;/i';
        return preg_replace($SCRIPT_REGEX_SANITIZED, "", preg_replace($SCRIPT_REGEX, "", $content));
    }
}
