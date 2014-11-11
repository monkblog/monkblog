@extends('layout')

@section('content')
    {{ Form::open( [ 'route' => 'login' ] ) }}
        {{ Form::label( 'email', 'Email' ) }}
        {{ Form::email( 'email' ) }}
        {{ Form::label( 'password', 'Password' ) }}
        {{ Form::password( 'password' ) }}
        {{ Form::submit( 'Login' ) }}
    {{ Form::close() }}
@stop
