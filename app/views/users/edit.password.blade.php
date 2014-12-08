@extends( 'admin.layout' )

@section( 'content' )
    {{ Form::model( $user, [ 'route' => [ 'admin.users.update', $user->id ], 'method' => 'put' ] ) }}
        {{ Form::hidden( 'first_name' ) }}
        {{ Form::hidden( 'last_name' ) }}
        {{ Form::hidden( 'display_name' ) }}
        {{ Form::hidden( 'email' ) }}
        {{ Form::label( 'old_password', 'Old Password' ) }}
        {{ Form::password( 'old_password' ) }}
        {{ Form::label( 'password', 'New Password' ) }}
        {{ Form::password( 'password' ) }}
        {{ Form::label( 'password_confirmation', 'Confirm new Password' ) }}
        {{ Form::password( 'password_confirmation' ) }}
        {{ Form::submit( 'Save', [ 'class' => 'button' ] ) }}
    {{ Form::close() }}
@stop
