<p>Hello, {{ $team->name }}</p>

<p>You have new comment on your team <a href="{{ url('teams/' . $team->id) }}">{{ $team->name }} </a>page!</p>