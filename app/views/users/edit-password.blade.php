@extends( 'admin.layout' )

@section( 'content' )
    {{ Form::model( $user, [ 'route' => [ 'admin.users.savePassword', $user->id ], 'method' => 'put' ] ) }}
        {{ Form::hidden( 'first_name' ) }}
        {{ Form::hidden( 'last_name' ) }}
        {{ Form::hidden( 'display_name' ) }}
        {{ Form::hidden( 'email' ) }}

        {{ Form::label( 'old_password', 'Old Password' ) }}
        {{ Form::password( 'old_password', [ 'required' ] ) }}
        @if( $error = $errors->first( 'old_password' ) )
        <small class="error">{{ $error }}</small>
        @endif

        {{ Form::label( 'password', 'New Password' ) }}
        {{ Form::password( 'password', [ 'required' ] ) }}
        @if( $error = $errors->first( 'password' ) )
        <small class="error">{{ $error }}</small>
        @endif

        {{ Form::label( 'password_confirmation', 'Confirm new Password' ) }}
        {{ Form::password( 'password_confirmation', [ 'required' ] ) }}
        @if( $error = $errors->first( 'password_confirmation' ) )
        <small class="error">{{ $error }}</small>
        @endif
        {{ Form::submit( 'Update Password', [ 'class' => 'button' ] ) }}
    {{ Form::close() }}
@stop
