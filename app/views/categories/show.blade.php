@extends( 'layout' )

@section( 'content' )

    <h1>{{{ $category->title }}}</h1>

    <div id="content">
        <p>Maybe a list of posts with this category goes here...</p>
    </div>

@stop
