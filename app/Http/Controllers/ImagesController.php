<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Symfony\Component\HttpFoundation\Session\Session;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $images = Image::orderBy('created_at', 'asc')->get();
        return view('post', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = new Image();
        return view('imagesForm', compact('image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user()==null){
            return view('posts');
        }
        session_start();
        $pictureNr = rand(0,1000000);
        $image = new Image();
        $image->user_id = \Auth::user()->id;
        //$image->post_id = 1;
        $image->post_id = $_SESSION['postId'];
        $image->title = $request->imageTitle;
        $image->description = $request->imageDesc;
        $path = '/images/'.$image->user_id.'_'.$image->post_id.'_'.$pictureNr.'.jpg';
        $path = str_replace('\\', '/', $path);
        $image->url = $path;
        move_uploaded_file($_FILES["image"]["tmp_name"], public_path().$image->url);
        //$tempImage = imagecreatefromjpeg(public_path().$image->url);
        //$croppedImage = imagecrop($tempImage, array('x'=>600, 'y'=>400, 'width' => 600, 'height' => 400));
        //imagejpeg($croppedImage, public_path().'/cropped'.$image->url);
        
        if($image->save()){
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
