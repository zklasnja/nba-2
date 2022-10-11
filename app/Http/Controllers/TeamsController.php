<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use User;

class TeamsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        $teams = Team::all();
        
        return view('teams.index', compact('teams'));
    }

    public function show($id)
    {
        $data['team'] = Team::find($id);
        $data['players'] = Player::where('team_id', $data['team']->id)->get();
        $data['comments'] = Comment::where('team_id', $data['team']->id)->join('users', 'user_id', '=', 'users.id' )->get();
        return view('teams.show', compact('data'));
    }
    
}
