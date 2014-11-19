@extends( 'layout' )

@section( 'content' )

    <h1>{{{ $page->title }}}</h1>

    <div id="content">
        {{{ $page->body }}}
    </div>

@stop
