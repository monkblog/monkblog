var converter = new Showdown.converter();

$( document ).ready( function() {
    $( '#preview' ).html( converter.makeHtml( $( '#body' ).val() ) );

    $( '#body' ).keyup( function() {
        $( '#preview' ).html( converter.makeHtml( $( '#body' ).val() ) );
        $( '#body' ).css( 'height', $( '#preview' ).height() + 'px' );
    });

    $( '#body' ).css( 'height', $( '#preview' ).height() + 'px' );

    $( '#title' ).blur( function () {
        if ( $( '#slug' ).val() === '' ) {
            var suggestedSlug = $( '#title' ).val()
                .toLowerCase()
                .replace( / /g, '-' )
                .replace( /[^\w-]+/g, '' )
            ;
            $( '#slug ' ).val( suggestedSlug );
        }
    });
});
