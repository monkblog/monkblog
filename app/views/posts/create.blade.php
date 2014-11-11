@extends('admin.layout')

@section('content')
    {{ Form::model( $post, [ 'route' => 'admin.posts.store' ] ) }}
    {{ Form::label( 'title', 'Title' ) }}
    {{ Form::text( 'title' ) }}
    {{ Form::label( 'slug', 'Slug' ) }}
    {{ Form::text( 'slug' ) }}
    {{ Form::label( 'summary', 'Summary' ) }}
    {{ Form::text( 'summary' ) }}
    {{ Form::label( 'category_id', 'Category' ) }}
    {{ Form::select( 'category_id', $categories ) }}
    {{ Form::label( 'body', 'Body' ) }}
    {{ Form::textarea( 'body' ) }}
    {{ Form::submit( 'Finish Draft' ) }}
    {{ Form::close() }}
@stop
