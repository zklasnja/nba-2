<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function show($id)
    {
        $player = Player::with('team')->find($id);
        
        return view('players.show', compact('player'));
    }
}
