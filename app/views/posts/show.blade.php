@extends( 'layout' )

@section( 'bodyclass' )
post
@stop

@section( 'top-content' )
    <h1>{{ str_replace( "'", '&rsquo;', $post->title ) }}</h1>
@stop

@section( 'content' )
    <article class="post full">
        <div class="meta">{{ date( $dateFormat, strtotime( $post->published_at ) ) }}</div>

        <div id="content">
            {{ Markdown::render( $post->body ) }}
        </div>
    </article>
@stop
