@extends('layouts.master')

@section('title', 'News')

@section('content')
    <div class="blog-post">
        {{-- {{ dd($users) }} --}}
        <h2 class="blog-post-title">{{ $users->title }}</h2>
        <p class="blog-post-meta">Author: {{ $users->name }}</p>
    </div>
    <div>
        <p>{{ $users->content }}</p>
    </div>

@endsection
