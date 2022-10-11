@extends('layouts.master')

@section('title', 'News')

@section('content')
    <ul>
        @foreach ($users as $user)
            <li>
                <a href="/news/{{ $user->id }}">
                    {{ $user->title }}
                </a>
                <p>Author:{{ $user->name }}</p>
                <p>Email:{{ $user->email }}</p>
                <p>From:{{ $user->created_at }}</p>
            </li>
        @endforeach
        <hr>
        {{ $news->links() }}
    </ul>
@endsection
