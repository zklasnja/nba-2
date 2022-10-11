<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


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
        
        return redirect()->back();
    }
}
