<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Mail\CommentReceived;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function store(CreateCommentRequest $request, $id)
    {
        Comment::create([
            'content' => $request->validated()['content'],
            'user_id' => Auth::user()->id,
            'team_id' => $id
        ]);

        $team = Team::find($id);
        Mail::to($team->email)->send(new CommentReceived($team));
    
        return redirect()->back();
    }
}
