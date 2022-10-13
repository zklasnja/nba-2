@section('aside')
    <aside class="col-md-4 blog-sidebar">
        <div class="p-3 mb-3 bg-light rounded">
            @if (count($news->teams) > 0)
                <h4 class="font-italic">Teams:</h4>
                <ol class="list-unstyled mb-0">
                    @foreach ($news->teams as $team)
                        <li class="blog-post-meta">
                            <a href="/news/teams/{{ $team->id }}">{{ $team->name }}</a>
                        </li>
                    @endforeach
                @else
                    <p></p>
            @endif
            </ol>
        </div>
    </aside><!-- /.blog-sidebar -->
@endsection
