<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class NewsConstroller extends Controller
{
    public function index()
    {

        $news = News::with('user', 'teams')->paginate(10);
        // dd($news);
        // $news = DB::table('news')->paginate(5);
        // $users = User::with('news')->join('news', 'user_id', '=', 'users.id' )->get();
        
        // $teams = Team::with('news')->paginate();
        // dd($teams);
        // return view('news.index', compact('news', 'users', 'teams'));

        return view('news.index', compact('news'));
    }

    public function teamNews(Team $team){
        $news = $team->news()->paginate(5);

        return view('news.index', compact('news') );
    }

    public function show($id)
    {
        $news = News::with('teams', 'user')->findOrFail($id);

        return view('news.show', compact('news'));
    }
}
