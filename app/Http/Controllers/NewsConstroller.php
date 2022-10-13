<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Models\News;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class NewsConstroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {

        $news = News::with('user', 'teams')->latest()->paginate(5);
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

    public function create()
    {
        $teams = Team::all();

        return view('news.create', compact('teams'));
    }

    public function store(CreateNewsRequest $request)
    {
        $validated = $request->validated();

        $news = News::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => auth()->id(),
        ]);

        $news->teams()->attach($request['teams']);

        session()->flash('message', 'Thank you for publishing article on www.nba.com');

        return redirect('/news');
    }
}
