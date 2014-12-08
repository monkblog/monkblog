@extends( 'admin.layout' )

@section( 'content' )
    {{ Form::model( $user, [ 'route' => [ 'admin.users.update', $user->id ], 'method' => 'put' ] ) }}
        {{ Form::label( 'first_name', 'First Name' ) }}
        {{ Form::text( 'first_name' ) }}
        {{ Form::label( 'last_name', 'Last Name' ) }}
        {{ Form::text( 'last_name' ) }}
        {{ Form::label( 'display_name', 'Display Name' ) }}
        {{ Form::text( 'display_name' ) }}
        @if( $error = $errors->first( 'display_name' ) )
        <small class="error">{{ $error }}</small>
        @endif
        {{ Form::label( 'email', 'Email' ) }}
        {{ Form::email( 'email' ) }}
        @if( $error = $errors->first( 'email' ) )
        <small class="error">{{ $error }}</small>
        @endif
        {{ Form::label( 'password', 'Enter Password to Update' ) }}
        {{ Form::password( 'password' ) }}
        @if( $error = $errors->first( 'password' ) )
        <small class="error">{{ $error }}</small>
        @endif
        {{ Form::submit( 'Update', [ 'class' => 'button' ] ) }}
    {{ Form::close() }}
@stop
