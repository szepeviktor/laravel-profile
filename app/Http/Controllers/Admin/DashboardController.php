<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home')
            ->with('posts', Post::get())
            ->with('postsCount', Post::count())
            ->with('postsPublishedCount', Post::published()->count())
            ->with('tips', Tip::get())
            ->with('tipsCount', Tip::count())
            ->with('tipsPublishedCount', Tip::published()->count());
    }
}
