@extends( 'layout' )

@section( 'content' )
    @if( !empty( $featuredPost ) )
    <article class="featured">
        <h1>{{{ $featuredPost->title }}}</h1>
        <span class="meta">{{ date( $dateFormat, strtotime( $featuredPost->published_at ) ) }}</span>
        <div class="summary">{{{ $featuredPost->summary }}}</div>
        <a href="{{ URL::route( 'post.public.show', $featuredPost->slug ) }}">Read More</a>
    </article>
    @endif

    @if( count( $recentPosts ) != 0 )
        @foreach( $recentPosts as $index => $post )
            <article class="post small-4 columns">
                <h2><a href="{{ URL::route( 'post.public.show', $post->slug ) }}">{{{ $post->title }}}</a></h2>
                <span class="meta">{{ date( $dateFormat, strtotime( $post->published_at ) ) }}</span>
                <div class="summary">{{{ $post->summary }}}</div>
                <a href="{{ URL::route( 'post.public.show', $post->slug ) }}">Read More</a>
            </article>
        @endforeach
    @else
     <article class="post small-4 columns">
         <h2>No Posts Found</h2>
         <div class="summary">Nothing to see here yet.</div>
     </article>
    @endif

    @if( $more )
        <a href="{{ URL::route( 'archive', [ 3, 5 ] ) }}" class="post-nav next">Older Posts</a>
    @endif
@stop
