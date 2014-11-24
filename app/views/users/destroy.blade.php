@extends( 'admin.layout' )

@section( 'content' )
    <p>Are you sure you want to delete "{{{ $user->display_name }}}?" This cannot be undone.</p>

    <a href="{{ route( 'admin.categories.index' ) }}" class="button">Cancel</a>
    {{ Form::model( $user, [ 'route' => [ 'admin.users.destroy', $user->id ], 'method' => 'delete' ] ) }}
    {{ Form::submit( 'Delete Forever', [ 'class' => 'button alert' ] ) }}
    {{ Form::close() }}
@stop
