<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Description;
use App\Services\UserService;

class UsersController extends Controller
{
    public function show($id)
    {
        return view('user', UserService::compactForShow($id));
    }

}
