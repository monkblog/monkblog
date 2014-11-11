@extends('layout')

@section('content')

    <h1>{{{ $post->title }}}</h1>

    <span class="meta">
        Posted On {{{ $post->created_at }}}
    </span>

    <div id="content">
        {{{ $post->body }}}
    </div>

@stop
