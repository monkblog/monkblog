@extends( 'admin.layout' )

@section( 'content' )

    <p>Are you sure you want to delete "{{{ $page->title }}}?" This cannot be undone.</p>

    <a href="{{ route( 'admin.pages.index' ) }}" class="button">Cancel</a>
    {{ Form::model( $page, [ 'route' => [ 'admin.pages.destroy', $page->id ], 'method' => 'delete' ] ) }}
    {{ Form::submit( 'Delete Forever', [ 'class' => 'button alert' ] ) }}
    {{ Form::close() }}

@stop
