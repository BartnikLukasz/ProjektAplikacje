<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'asc')->get();
        return view('posts', compact('posts'));
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
        ]);
        session_start();
        $post = new Post();
        $post->user_id = \Auth::user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        if($post->save()){
            $_SESSION['postId'] = $post->id;
            return redirect()->route('storeImage');
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
        return view('post', compact('post'));
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
        $post->content = $request->message;
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
        if(\Auth::user()->id != $post->user_id){
            return back()->with(['success' => false, 'message_type' => 'danger', 
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
            }
        if($post->delete()){
            return redirect()->route('posts')->with(['success' => true, 'message_type' => 'success', 
                'message' => 'Pomyślnie skasowano post użytkownika '.$post->user->name.'.']);
        }
        return back()->with(['success' => false, 'message_type' => 'danger', 
            'message' => 'Wystąpił błąd podczas kasowania postu użytkownika '.$post->user->name.'. Spróbuj później.']);
    }
}
