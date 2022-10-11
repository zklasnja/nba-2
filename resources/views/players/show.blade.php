@extends('layouts.master')

@section('title', 'NBA teams')

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">Player: {{ $player->first_name }} {{ $player->last_name }}</h2>
        <p class="blog-post-meta">email: {{ $player->email }}, team: <a href="/teams/{{ $player->team_id }}">{{ $player->team->name }}</a>
    </div>
@endsection
