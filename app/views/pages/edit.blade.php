@extends( 'admin.layout' )

@section( 'content' )
    {{ Form::model( $page, [ 'route' => [ 'admin.pages.update', $page->id ], 'method' => 'put' ] ) }}
    {{ Form::label( 'title', 'Title' ) }}
    {{ Form::text( 'title' ) }}
    {{ Form::label( 'slug', 'Slug' ) }}
    {{ Form::text( 'slug' ) }}
    {{ Form::label( 'body', 'Body' ) }}
    {{ Form::textarea( 'body' ) }}
    {{ Form::submit( 'Save', [ 'class' => 'button' ] ) }}
    {{ Form::close() }}
@stop
