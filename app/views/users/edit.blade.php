@extends( 'admin.layout' )

@section( 'content' )
    {{ Form::model( $user, [ 'route' => [ 'admin.users.update', $user->id ], 'method' => 'put' ] ) }}
        {{ Form::label( 'first_name', 'First Name' ) }}
        {{ Form::text( 'first_name' ) }}
        {{ Form::label( 'last_name', 'Last Name' ) }}
        {{ Form::text( 'last_name' ) }}
        {{ Form::label( 'display_name', 'Display Name' ) }}
        {{ Form::text( 'display_name' ) }}
        {{ Form::label( 'email', 'Email' ) }}
        {{ Form::email( 'email' ) }}
        {{ Form::label( 'password', 'Enter Password to Update' ) }}
        {{ Form::password( 'password' ) }}
        {{ Form::submit( 'Save', [ 'class' => 'button' ] ) }}
    {{ Form::close() }}
@stop
