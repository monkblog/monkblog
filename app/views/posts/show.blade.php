@extends('layout')

@section('content')

    <article class="post full">
        <h1>{{{ $post->title }}}</h1>

        <div class="meta">{{ date( $dateFormat, strtotime( $post->published_at ) ) }}</div>

        <div id="content">
            {{ Markdown::render( $post->body ) }}
        </div>
    </article>

@stop
