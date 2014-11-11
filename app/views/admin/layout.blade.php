<!DOCTYPE html>
<html>
    <head>
        <title>{{{ $pageTitle }}} | {{{ $siteTitle }}} Admin</title>
        <link type="text/css" rel="stylesheet" href="css/normalize.css">
        <link type="text/css" rel="stylesheet" href="css/general_foundicons_ie7.css">
        <link type="text/css" rel="stylesheet" href="css/general_foundicons.css">
        <link type="text/css" rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name"><h1><a href="{{ URL::route( 'home' ) }}">{{{ $siteTitle }}}</a></h1></li>
            </ul>
            <section class="top-bar-section">
                <ul class="right">
                    <li><a href="{{ URL::route( 'admin.home' ) }}">Home</a></li>
                    <li><a href="{{ URL::route( 'admin.posts.index' ) }}">Posts</a></li>
                    <li><a href="{{ URL::route( 'admin.pages.index' ) }}">Pages</a></li>
                    <li><a href="{{ URL::route( 'admin.categories.index' ) }}">Categories</a></li>
                    <li><a href="{{ URL::route( 'admin.tags.index' ) }}">Tags</a></li>
                    <li><a href="{{ URL::route( 'admin.users.index' ) }}">Users</a></li>
                    <li><a href="{{ URL::route( 'logout' ) }}">Logout</a></li>
                </ul>
            </section>
        </nav>
        <div id="container">
            @yield('content')
        </div>
        <footer>
            <p>Powered by Monk&trade; v{{{ $monkVersion }}}</p>
        </footer>
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
