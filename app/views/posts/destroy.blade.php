@extends( 'admin.layout' )

@section( 'content' )

    <p>Are you sure you want to delete "{{{ $post->title }}}?" This cannot be undone.</p>

    <a href="{{ route( 'admin.posts.index' ) }}" class="button">Cancel</a>
    {{ Form::model( $post, [ 'route' => [ 'admin.posts.destroy', $post->id ], 'method' => 'delete' ] ) }}
    {{ Form::submit( 'Delete Forever', [ 'class' => 'button alert' ] ) }}
    {{ Form::close() }}

@stop
