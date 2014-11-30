@extends( 'admin.layout' )

@section( 'content' )
    {{ Form::model( $user, [ 'route' => 'admin.users.update' ] ) }}
        {{ Form::label( 'first_name', 'First Name' ) }}
        {{ Form::text( 'first_name' ) }}
        {{ Form::label( 'last_name', 'Last Name' ) }}
        {{ Form::text( 'last_name' ) }}
        {{ Form::label( 'display_name', 'Display Name' ) }}
        {{ Form::text( 'display_name' ) }}
        {{ Form::label( 'email', 'Email' ) }}
        {{ Form::email( 'email' ) }}
        {{ Form::label( 'password', 'Password' ) }}
        {{ Form::password( 'password' ) }}
        {{ Form::label( 'password_confirmation', 'Confirm Password' ) }}
        {{ Form::password( 'password_confirmation' ) }}
        {{ Form::submit( 'Save', [ 'class' => 'button' ] ) }}
    {{ Form::close() }}
@stop
