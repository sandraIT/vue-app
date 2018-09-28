(
    function ( $ ) {
        'use strict';

        $( window ).on( 'load', function () {
            $( '.wavify-item' ).each( function () {

                var _color     = $( this ).data( 'wavify-background' ) ? $( this ).data( 'wavify-background' ) : '#fff',
                    _height    = $( this ).data( 'wavify-height' ) ? $( this ).data( 'wavify-height' ) : 100,
                    _bones     = $( this ).data( 'wavify-bones' ) ? $( this ).data( 'wavify-bones' ) : 3,
                    _amplitude = $( this ).data( 'wavify-amplitude' ) ? $( this ).data( 'wavify-amplitude' ) : 80,
                    _speed     = $( this ).data( 'wavify-speed' ) ? $( this ).data( 'wavify-speed' ) : .15;

                $( this ).find( 'path' ).wavify( {
                    height: _height,
                    bones: _bones,
                    amplitude: _amplitude,
                    color: _color,
                    speed: _speed
                } );
            } );
        } );
    }( window.jQuery )
);
