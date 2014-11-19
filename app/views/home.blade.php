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
    @if( $more )
        <a href="{{ URL::route( 'archive', [ 3, 5 ] ) }}" class="post-nav next">Older Posts</a>
    @endif
@stop
