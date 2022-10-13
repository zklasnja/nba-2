@extends('layouts.master')

@section('title', 'Create a news post')

@section('content')
    <form method="POST" action="/news">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" />
        </div>

        @error('title')
            @include('partials.error')
        @enderror

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" rows="10" class="form-control"></textarea>
        </div>

        @error('content')
            @include('partials.error')
        @enderror

        <h6>
            @foreach ($teams as $team)
                <div class="form-group form-check">
                    <input 
                        type="checkbox" 
                        value="{{ $team->id }}" 
                        class="form-check-input"
                        name="teams[]"
                        id="team_{{ $team->id }}"
                        >
                    <label for="team_{{ $team->id }}" class="form-check-label">
                        {{ $team->name }}
                    </label>
                </div>
            @endforeach
        </h6>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
