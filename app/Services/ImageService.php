<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Session\Session;

class ImageService {

    public static function saveImage(Request $request) {
        session_start();
        $pictureNr = rand(0,1000000);
        $image = new Image();
        $image->user_id = \Auth::user()->id;
        $image->post_id = $_SESSION['postId'];
        $image->title = $request->imageTitle;
        $image->description = $request->imageDesc;
        $path = '/images/'.$image->user_id.'_'.$image->post_id.'_'.$pictureNr.'.jpg';
        $path = str_replace('\\', '/', $path);
        $image->url = $path;
        move_uploaded_file($_FILES["image"]["tmp_name"], public_path().$image->url);
        if($image->save()) {
            return $image;
        }
        return false;
    }

    public static function deleteImages($images) {
        foreach($images as $image) {
            if(file_exists(public_path().$image->url)) {
                unlink(public_path().$image->url);
            }
        }
    }
}
