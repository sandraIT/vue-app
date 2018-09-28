/*--------------------------------------------------------------
 Custom js
 --------------------------------------------------------------*/
jQuery( document ).ready( function( $ ) {
	'use strict';

	var $body = $( 'body' );

initMiniCart();
//initQuickViewPopup();
initQuantityButtons();
initCookieNotice();

function initCookieNotice() {
    if ( $insight.noticeCookieEnable == 1 && $insight.noticeCookieConfirm != 'yes' && $insight.noticeCookieMessages != '' ) {

        $.growl( {
            location: 'br',
            fixed: true,
            duration: 3600000,
            title: '',
            message: $insight.noticeCookieMessages
        } );

        $( '#tm-button-cookie-notice-ok' ).on( 'click', function () {
            $( this ).parents( '.growl-message' ).first().siblings( '.growl-close' ).trigger( 'click' );

            var _data = {
                action: 'notice_cookie_confirm'
            };

            _data = $.param( _data );

            $.ajax( {
                url: $insight.ajaxurl,
                type: 'POST',
                data: _data,
                dataType: 'json',
                success: function ( results ) {

                    $.growl.notice( {
                        location: 'br',
                        duration: 5000,
                        title: '',
                        message: $insight.noticeCookieOKMessages
                    } );

                },
                error: function ( errorThrown ) {
                    alert( errorThrown );
                }
            } );
        } );
    }
}

function initMiniCart() {
    var $miniCart = $( '#mini-cart' );
    $miniCart.on( 'click', function () {
        if ( ! SmartPhone.isAny() ) {
            $( this ).addClass( 'open' );
        } else {
            window.location.href = $( this ).data( 'url' );
        }
    } );

    $( document ).on( 'click', function ( e ) {
        if ( $( e.target ).closest( $miniCart ).length == 0 ) {
            $miniCart.removeClass( 'open' );
        }
    } );
}

/*function initQuickViewPopup() {
    $( '.quickview-btn' ).each( function () {
        var $popup = $( this ).siblings( '.woo-quick-view-popup' );

        $( this ).magnificPopup( {
            items: {
                src: $popup.html(),
                type: 'inline'
            },
            callbacks: {
                beforeOpen: function () {
                    this.st.mainClass = 'mfp-3d-unfold';
                },
                open: function () {
                    if ( typeof isw != 'undefined' && typeof isw.Swatches !== 'undefined' ) {
                        isw.Swatches.init();
                    }

                    $( '.woo-quick-view-popup-content .tm-swiper' ).insightSwiper();
                    $( '.woo-quick-view-popup-content .entry-summary' ).perfectScrollbar( {theme: 'woosq'} );
                }
            }
        } );
    } );
}*/

function initQuantityButtons() {
    $( document ).on( 'click', '.increase, .decrease', function () {

        // Get values
        var $qty       = $( this ).siblings( '.qty' ),
            currentVal = parseFloat( $qty.val() ),
            max        = parseFloat( $qty.attr( 'max' ) ),
            min        = parseFloat( $qty.attr( 'min' ) ),
            step       = $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) {
            currentVal = 0;
        }
        if ( max === '' || max === 'NaN' ) {
            max = '';
        }
        if ( min === '' || min === 'NaN' ) {
            min = 0;
        }
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) {
            step = 1;
        }

        // Change the value
        if ( $( this ).is( '.increase' ) ) {

            if ( max && (
                    max == currentVal || currentVal > max
                ) ) {
                $qty.val( max );
            } else {
                $qty.val( currentVal + parseFloat( step ) );
            }

        } else {

            if ( min && (
                    min == currentVal || currentVal < min
                ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( currentVal - parseFloat( step ) );
            }

        }

        // Trigger change event.
        $qty.trigger( 'change' );
    } );
}

});
