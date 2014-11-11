@extends('admin.layout')

@section('content')
    {{ Form::model( $category, [ 'route' => 'admin.categories.store' ] ) }}
    {{ Form::label( 'title', 'Title' ) }}
    {{ Form::text( 'title' ) }}
    {{ Form::label( 'slug', 'Slug' ) }}
    {{ Form::text( 'slug' ) }}
    {{ Form::label( 'description', 'Description' ) }}
    {{ Form::text( 'description' ) }}
    {{ Form::submit( 'Create' ) }}
    {{ Form::close() }}
@stop
