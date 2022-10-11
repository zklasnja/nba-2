@extends('layouts.master')

@section('title', 'NBA teams')

@section('content')
    <ul>
        @foreach ($teams as $team)
            <li>
                <a href="{{ route('team', ['id' => $team->id]) }}">
                    {{ $team->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
