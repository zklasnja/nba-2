@extends('layouts.master')

@section('title', 'News')

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $news->title }}</h2>
        <p class="blog-post-meta">Author: {{ $news->user->name }}</p>
    </div>
    <div>
        <p>{{ $news->content }}</p>
    </div>
@endsection
@include('news.aside')
