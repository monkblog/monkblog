@extends( 'layout' )

@section( 'content' )

    <h1>{{{ $page->title }}}</h1>

    <div id="content">
        {{ Markdown::render( $page->body ) }}
    </div>

@stop
