@extends('admin.layout')

@section('content')
    <table>
        <thead>
            <tr><th>Title</th><th>Slug</th><th>Description</th><th></th></tr>
        </thead>
        <tbody>
    @foreach( $categories as $category )
        <tr><td><a href="{{ URL::route( 'admin.categories.edit', $category->id ) }}">{{{ $category->title }}}</a></td><td>{{{ $category->slug }}}</td><td>{{{ $category->description }}}</td><td><button>Delete</button></td></tr>
    @endforeach
        </tbody>
    </table>
    <a href="{{ URL::route( 'admin.categories.create' ) }}" class="button">Create New Category</a>
@stop
