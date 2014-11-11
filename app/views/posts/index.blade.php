@extends('admin.layout')

@section('content')
    <table>
        <thead>
            <tr><th>Title</th><th>Slug</th><th>Summary</th><th></th></tr>
        </thead>
        <tbody>
    @foreach( $posts as $post )
        <tr><td><a href="{{ URL::route( 'admin.posts.edit', $post->id ) }}">{{{ $post->title }}}</a></td><td>{{{ $post->slug }}}</td><td>{{{ $post->summary }}}</td><td><button>Delete</button></td></tr>
    @endforeach
        </tbody>
    </table>
    <a href="{{ URL::route( 'admin.posts.create' ) }}" class="button">Write New Post</a>
@stop
