<!DOCTYPE html>
<head>
    <title>{{{ $pageTitle }}} | {{{ $siteTitle }}} Admin</title>
    <link type="text/css" rel="stylesheet" href="css/admin.css">
</head>
<body>
    <nav>
        <span>Hello, {{{ Auth::user()->first_name }}}</span>
        <ul>
            <li><a href="{{ URL::route( 'logout' ) }}">Logout</a></li>
        </ul>
    </nav>
    <div id="container">
        @yield('content')
    </div>
</body>
</html>
