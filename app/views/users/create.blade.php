@extends( 'admin.layout' )

@section( 'content' )
    {{ Form::model( $user, [ 'route' => 'admin.users.store', 'required' ] ) }}
        {{ Form::label( 'first_name', 'First Name' ) }}
        {{ Form::text( 'first_name' ) }}
        @if( $error = $errors->first( 'first_name' ) )
        <small class="error">{{ $error }}</small>
        @endif
        {{ Form::label( 'last_name', 'Last Name' ) }}
        {{ Form::text( 'last_name' ) }}
        @if( $error = $errors->first( 'last_name' ) )
        <small class="error">{{ $error }}</small>
        @endif
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
        {{ Form::label( 'password', 'Password' ) }}
        {{ Form::password( 'password' ) }}
        {{ Form::label( 'password_confirmation', 'Confirm Password' ) }}
        {{ Form::password( 'password_confirmation' ) }}
        @if( $error = $errors->first( 'password' ) )
        <small class="error">{{ $error }}</small>
        @endif
        {{ Form::submit( 'Create', [ 'class' => 'button' ] ) }}
    {{ Form::close() }}
@stop
