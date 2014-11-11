<!DOCTYPE html>
<html>
    <head>
        <title>{{{ $pageTitle }}} | {{{ $siteTitle }}}</title>
        <link type="text/css" rel="stylesheet" href="css/normalize.css">
        <link type="text/css" rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div id="container">
            @yield('content')
        </div>
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
