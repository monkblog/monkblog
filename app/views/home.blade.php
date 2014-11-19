@extends( 'layout' )

@section( 'content' )
    <ul class="posts">
        @foreach( $recentPosts as $post )
        <li class="post">
            <h2>{{{ $post->title }}}</h2>
            <div class="summary">{{{ $post->summary }}}</div>
        </li>
        @endforeach
    </ul>
@stop
