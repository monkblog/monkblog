<!DOCTYPE html>
<html>
    <head>
        <title>{{{ $pageTitle }}} | {{{ $siteTitle }}}</title>
        <link type="text/css" rel="stylesheet" href="{{ asset( 'css/main.css' ) }}">
    </head>
    <body>
        <div class="row">
            @yield('content')
        </div>
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="{{ asset( 'js/foundation.min.js' ) }}"></script>
        <script src="{{ asset( 'js/app.js' ) }}"></script>
    </body>
</html>
