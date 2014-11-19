@extends( 'admin.layout' )

@section( 'content' )

    <p>Are you sure you want to delete "{{{ $category->title }}}?" This cannot be undone.</p>

    <a href="{{ route( 'admin.categories.index' ) }}" class="button">Cancel</a>
    {{ Form::model( $category, [ 'route' => [ 'admin.categories.destroy', $category->id ], 'method' => 'delete' ] ) }}
    {{ Form::submit( 'Delete Forever', [ 'class' => 'button alert' ] ) }}
    {{ Form::close() }}

@stop
