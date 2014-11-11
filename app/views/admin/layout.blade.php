<!DOCTYPE html>
<head>
    <title>{{{ $pageTitle }}} | {{{ $siteTitle }}} Admin</title>
    <link type="text/css" rel="stylesheet" href="css/admin.css">
</head>
<body>
    <nav>
        <span>Hello, {{{ Auth::user()->first_name }}}</span>
        <ul>
            <li><a href="{{ URL::route( 'admin.posts.index' ) }}">Posts</a></li>
            <li><a href="{{ URL::route( 'admin.pages.index' ) }}">Pages</a></li>
            <li><a href="{{ URL::route( 'admin.categories.index' ) }}">Categories</a></li>
            <li><a href="{{ URL::route( 'admin.tags.index' ) }}">Tags</a></li>
            <li><a href="{{ URL::route( 'admin.users.index' ) }}">Users</a></li>
            <li><a href="{{ URL::route( 'logout' ) }}">Logout</a></li>
        </ul>
    </nav>
    <div id="container">
        @yield('content')
    </div>
</body>
</html>
