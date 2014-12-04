<section>
    <h3>Navigation</h3>

    <ul class="side-nav" role="navigation">
        <li role="menuitem"><a href="{{ URL::route( 'home' ) }}">Home</a></li>
        <li role="menuitem"><a href="{{ URL::route( 'archive', [ 0, 5 ] ) }}">Archive</a></li>
        @foreach( $pageList as $page )
            <li role="menuitem"><a href="{{ URL::route( 'page.public.show', $page->slug ) }}">{{{ $page->title }}}</a></li>
        @endforeach
    </ul>
</section>

<section>
    <h3>Contact Info</h3>

    <ul class="side-nav" role="navigation">
        <li role="menuitem">Email: <a href="mailto:manatrance@gmail.com">manatrance@gmail.com</a></li>
        <li role="menuitem">Facebook: <a href="https://www.facebook.com/ben.overmyer">ben.overmyer</a></li>
        <li role="menuitem">Twitter: <a href="https://www.twitter.com/bovermyer">@bovermyer</a></li>
    </ul>
</section>
