@extends('admin.layout')

@section('content')
    <table>
        <thead>
            <tr><th>Title</th><th>Slug</th><th>Created</th><th>Published</th><th></th></tr>
        </thead>
        <tbody>
    @foreach( $pages as $page )
        <tr>
            <td><a href="{{ route( 'admin.pages.edit', $page->id ) }}">{{{ $page->title }}}</a></td>
            <td>{{{ $page->slug }}}</td>
            <td>{{{ $page->created_at }}}</td>
            <td>
                @if( !$page->is_published )
                    <a href="{{ route( 'admin.pages.publish', $page->id ) }}" class="button tiny">Publish</a>
                @else
                    <span>{{{ $page->published_at }}}</span>
                @endif
            </td>
            <td>
                <a href="{{ route( 'page.public.show', $page->slug ) }}" class="button tiny">View</a>
                <a href="{{ route( 'admin.pages.confirmdestroy', $page->id ) }}" class="button tiny alert">Delete</a>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
    <a href="{{ route( 'admin.pages.create' ) }}" class="button">Write New Page</a>
@stop
