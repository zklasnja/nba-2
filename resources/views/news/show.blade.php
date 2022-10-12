@extends('layouts.master')

@section('title', 'News')

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $news->title }}</h2>
        <p class="blog-post-meta">Author: {{ $news->user->name }}</p>
        @if (count($news->teams) > 0)
            <p class="blog-post-meta">Teams:
                @foreach ($news->teams as $team)
                    <a href="/news/teams/{{ $team->id}}">{{ $team->name }}</a>
                @endforeach
            </p>
        @else
            <p></p>
        @endif
    </div>
    <div>
        <p>{{ $news->content }}</p>
    </div>

@endsection
