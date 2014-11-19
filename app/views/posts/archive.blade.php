@extends( 'layout' )

@section( 'content' )
    <h1>Post Archive</h1>

    <ul class="posts">
        @foreach( $posts as $post )
        <li class="post">
            <h2><a href="{{ URL::route( 'post.public.show', $post->slug ) }}">{{{ $post->title }}}</a></h2>
            <span class="meta">{{ date( $dateFormat, strtotime( $post->published_at ) ) }}</span>
            <div class="summary">{{{ $post->summary }}}</div>
            <a href="{{ URL::route( 'post.public.show', $post->slug ) }}">Read More</a>
        </li>
        @endforeach
    </ul>
    @if( $less )
        <a href="{{ URL::route( 'archive', [ $offset - $limit, $limit ] ) }}" class="post-nav previous left">Newer Posts</a>
    @endif
    @if( $more )
        <a href="{{ URL::route( 'archive', [ $offset + $limit, $limit ] ) }}" class="post-nav next right">Older Posts</a>
    @endif
@stop
