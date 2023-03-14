<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Services\PostService;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts', PostService::compactForIndex());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('postsForm', PostService::compactForCreate());
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
        $post = PostService::savePost($request);
        if($post != false){
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
        return view('post', PostService::compactForShow($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compactedPost = PostService::compactForEdit($id);
        if($compactedPost == false) {
            return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        return view('postsEditForm', $compactedPost);
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
        if(PostService::updatePost($request, $id)) {
            return redirect()->route('posts');
        }
        else {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
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
        if(PostService::deletePost($post)){

            return redirect()->route('posts')->with(['success' => true, 'message_type' => 'success',
                'message' => 'Pomyślnie skasowano post użytkownika '.$post->user->name.'.']);
        }
        return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Wystąpił błąd podczas kasowania postu użytkownika '.$post->user->name.'. Spróbuj później.']);
    }
}
