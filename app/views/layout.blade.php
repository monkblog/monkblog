<!DOCTYPE html>
<html>
    <head>
        <title>{{{ $pageTitle }}} | {{{ $siteTitle }}}</title>
        <link href='http://fonts.googleapis.com/css?family=Cabin:500|Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" href="{{ asset( 'css/main.css' ) }}">
    </head>
    <body>
        <div class="row">
            <header class="small-12 columns @if( Route::currentRouteName() == 'home' ) home @endif">
                <h1><a href="{{ URL::route( 'home' ) }}">{{{ $siteTitle }}}</a> <small>Developer and Game Designer</small></h1>
            </header>
        </div>
        <div class="row">
            <div class="small-9 columns">
                @yield( 'content' )
            </div>
            <div class="small-3 columns">
                @include( 'sidebar' )
            </div>
        </div>
        <div class="row">
            <footer class="small-12 columns">
                <p>This site is an online journal. It's not really intended to be copyrighted, trademarked, or otherwise legal-ified. I trust that you won't take my writing and use it as your own. If you do, though, I'm not going to do anything about it.</p>
            </footer>
        </div>
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="{{ asset( 'js/foundation.min.js' ) }}"></script>
        <script src="{{ asset( 'js/app.js' ) }}"></script>
    </body>
</html>
