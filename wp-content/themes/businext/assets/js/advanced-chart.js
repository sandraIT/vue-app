jQuery( document ).ready( function ( $ ) {
    'use strict';

    var font = $( 'body' ).data( 'font' );

    Chart.defaults.global.defaultFontFamily = font;
    Chart.defaults.global.defaultFontSize   = 15;
    Chart.defaults.global.defaultFontColor  = '#222';

    $( '.tm-js-chart' ).waypoint( function () {
        var $el = this.element ? this.element : $( this );

        var dataString = $el.find( '.chart-data' ).html();
        var data       = false;
        try {
            data = JSON.parse( dataString );
        } catch ( ex ) {
        }
        if ( data ) {
            var $canvas = $el.children( 'canvas' );

            new Chart( $canvas, data );
        }

    }, {
        offset: '90%',
        triggerOnce: true
    } );
} );
