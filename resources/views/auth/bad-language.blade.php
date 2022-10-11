@extends('layouts.master')

@section('title', 'Forbidden')

@section('content')
    <h2>Bad language detected!</h2>
    <hr>

    <p>Forbidden language has been used in the comments. In order for comment to be published, please use the proper language!</p>
    <p>Get back to <a href="/">teams page</a></p>
@endsection
