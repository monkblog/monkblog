@extends( 'layout' )

@section( 'content' )
    <ul class="posts">
        @foreach( $posts as $post )
        <li class="post">
            <h2>{{{ $post->title }}}</h2>
            <div class="summary">{{{ $post->summary }}}</div>
        </li>
        @endforeach
    </ul>
    @if( $less )
        <a href="{{ URL::route( 'archive', [ $offset - $limit, $limit ] ) }}" class="post-nav previous">Newer Posts</a>
    @endif
    @if( $more )
        <a href="{{ URL::route( 'archive', [ $offset + $limit, $limit ] ) }}" class="post-nav next">Older Posts</a>
    @endif
@stop
