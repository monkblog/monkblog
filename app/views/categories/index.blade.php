@extends( 'admin.layout' )

@section( 'content' )
    <table>
        <thead>
            <tr><th>Title</th><th>Slug</th><th>Description</th><th></th></tr>
        </thead>
        <tbody>
    @foreach( $categories as $category )
        <tr>
            <td><a href="{{ URL::route( 'admin.categories.edit', $category->id ) }}">{{{ $category->title }}}</a></td>
            <td>{{{ $category->slug }}}</td>
            <td>{{{ $category->description }}}</td>
            <td><a href="{{ URL::route( 'admin.categories.confirmdestroy', $category->id ) }}" class="button alert">Delete</a></td>
            </tr>
    @endforeach
        </tbody>
    </table>
    <a href="{{ URL::route( 'admin.categories.create' ) }}" class="button">Create New Category</a>
@stop
