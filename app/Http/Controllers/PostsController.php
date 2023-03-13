<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('posts', compact('posts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('postsForm', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if(\Auth::user()==null){
            return view('posts');
        }
        $validated = $request->validate([
        'content' => 'required|min:100|max:10000',
        'contentPreview' => 'min:10|max:250',
        ]);
        session_start();
        $post = new Post();
        $post->user_id = \Auth::user()->id;
        $post->title = $request->title;
        $post->content_preview = $request->contentPreview;
        $post->content = $this->sanitize($request->content);
        if($post->save()){
            $_SESSION['postId'] = $post->id;
            return redirect()->route('createImage', [$post->id]);
        }
        return "Wystąpił błąd";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $images = $post->images()->get();
        $comments = $post->comments()->get();
        $userIds = collect(['']);
        foreach($comments as $comment) {
            $userIds->push($comment->user_id);
        }
        $users = User::whereIn('id', $userIds)->get();

        return view('post', compact('post', 'images', 'comments', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (\Auth::user()->id != $post->user_id) {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        return view('postsEditForm', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if(\Auth::user()->id != $post->user_id){
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        $post->content = $this->sanitize($request->content);
        if($post->save()) {
            return redirect()->route('posts');
        }
        return "Wystąpił błąd.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $images = $post->images()->get();
        if(\Auth::user()->id != $post->user_id){
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
            }
        if($post->delete()){
            foreach($images as $image) {
                if(file_exists(public_path().$image->url)) {
                    unlink(public_path().$image->url);
                }
            }
            return redirect()->route('posts')->with(['success' => true, 'message_type' => 'success',
                'message' => 'Pomyślnie skasowano post użytkownika '.$post->user->name.'.']);
        }
        return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Wystąpił błąd podczas kasowania postu użytkownika '.$post->user->name.'. Spróbuj później.']);
    }

    private function sanitize($content) {
        $SCRIPT_REGEX = "/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i";
        return preg_replace($SCRIPT_REGEX, "", $content);
    }
}
