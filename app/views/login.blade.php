@extends('layout')

@section('content')
    {{ Form::open( [ 'route' => 'login', 'required' ] ) }}
        {{ Form::label( 'email', 'Email' ) }}
        {{ Form::email( 'email', Input::old( 'email' ), [ 'required' ] ) }}
        @if( $error = $errors->first( 'email' ) )
        <small class="error">{{ $error }}</small>
        @endif
        {{ Form::label( 'password', 'Password' ) }}
        {{ Form::password( 'password' , [ 'required' ] ) }}
        @if( $error = $errors->first( 'password' ) )
        <small class="error">{{ $error }}</small>
        @endif
        @if( $redirect )
        {{ Form::hidden( 'redirect_to' , $redirect ) }}
        @endif
        {{ Form::submit( 'Login', [ 'class' => 'button' ] ) }}
    {{ Form::close() }}
@stop
