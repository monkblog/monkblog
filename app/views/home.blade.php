@extends( 'layout' )

@section( 'content' )

    @foreach( $recentPosts as $post )
        <h2>{{{ $post->title }}}</h2>
        <p>{{{ $post->summary }}}</p>
    @endforeach

@stop
