<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard')->with(['posts' => $posts, 'user' => $user]);
    }
}
