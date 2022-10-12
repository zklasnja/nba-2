@extends('layouts.master')

@section('title', 'News')

@section('content')
    <ul>
        @foreach ($news as $singleNews)
            {{-- {{ dd($singleNews->teams) }} --}}

            <li>
                <a href="/news/{{ $singleNews->id }}">
                    {{ $singleNews->title }}
                </a>
                <p>Author:{{ $singleNews->user->name }}</p>
                <p>Email:{{ $singleNews->user->email }}</p>
                <p>From:{{ $singleNews->created_at }}</p>
            </li>
        @endforeach
        <hr>
        {{ $news->links() }}
    </ul>
@endsection
