@extends('layouts.master')

@section('title', 'NBA teams')

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">Team: {{ $data['team']->name }}</h2>
        <p class="blog-post-meta">email: {{ $data['team']->email }}, address: {{ $data['team']->address }}, city:
            {{ $data['team']->city }}</p>
    </div>
    <div>
        <ul>
            @foreach ($data['players'] as $player)
                <li>
                    <p><a href="{{ route('player', ['id' => $player->id]) }}" >{{ $player->first_name }} {{ $player->last_name }}</a></p>
                </li>
            @endforeach
        </ul>
    </div>
    <div>
        <h4>Comments:</h4>

        <ul>
            @foreach($data['comments'] as $comment)
                <li>
                    {{ $comment->name }}: {{ $comment->content }}
                </li>
            @endforeach
        </ul>        
    </div>

    <form method="POST" action="/teams/{{ $data['team']->id }}/comments">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Leave a comment:</label>
            <textarea name="content" rows="2" class="form-control"></textarea>
        </div>

        @error('content')
            @include('partials.error')
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
