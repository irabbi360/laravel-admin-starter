<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $count['users'] = User::count();

    
        $count['posts'] = 0;
        $count['posts_read'] = 0;
        $newPosts = 0;
        $topPosts = 0;

        return view('admin.index', compact('count'));
    }
}
