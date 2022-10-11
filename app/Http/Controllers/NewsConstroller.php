<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class NewsConstroller extends Controller
{
    public function index()
    {
        $news = DB::table('news')->paginate(5);
        $users = User::with('news')->join('news', 'user_id', '=', 'users.id' )->get();
        
        return view('news.index', compact('news', 'users'));
    }

    public function show($id)
    {
        $news = News::find($id);
        $users = News::find($id)->join('users', 'news.user_id', '=', 'users.id')->first();
        
        return view('news.show', compact('users'));
    }
}
