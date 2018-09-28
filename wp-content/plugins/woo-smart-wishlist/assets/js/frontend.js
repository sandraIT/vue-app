jQuery( document ).ready( function( jQuery ) {
	// add
	jQuery( 'body' ).on( 'click tap', '.woosw-btn', function( e ) {
		var _this = jQuery( this );
		var product_id = _this.attr( 'data-id' );
		var data = {
			action: 'wishlist_add',
			product_id: product_id
		};
		if ( _this.hasClass( 'woosw-added' ) && jQuery( '#woosw-area .woosw-content-mid' ).hasClass( 'woosw-content-loaded' ) ) {
			woosw_show();
		} else {
			_this.addClass( 'woosw-adding' );
			jQuery.post( woosw_vars.ajax_url, data, function( response ) {
				_this.removeClass( 'woosw-adding' );
				response = JSON.parse( response );
				if ( response['status'] == 1 ) {
					_this.addClass( 'woosw-added' );
					_this.html( woosw_vars.button_text_added );
					jQuery( '#woosw-area .woosw-content-mid' ).html( response['value'] ).addClass( 'woosw-content-loaded' );
					jQuery( '#woosw-area .woosw-content-mid' ).perfectScrollbar( {theme: 'woosw'} );
					if ( response['notice'] != null ) {
						jQuery( '#woosw-area .woosw-notice' ).html( response['notice'] );
						woosw_notice_show();
						setTimeout( function() {
							woosw_notice_hide();
						}, 3000 );
					}
				} else {
					if ( response['notice'] != null ) {
						jQuery( '#woosw-area .woosw-content-mid' ).html( '<div class="woosw-content-mid-notice">' + response['notice'] + '</div>' );
					}
				}
				if ( response['count'] != null ) {
					woosw_change_count( response['count'] );
				}
				woosw_show();
			} );
		}
		e.preventDefault();
	} );

	// remove
	jQuery( 'body' ).on( 'click tap', '.woosw-content-item--remove span', function( e ) {
		var _this_item = jQuery( this ).closest( '.woosw-content-item' );
		var product_id = _this_item.attr( 'data-id' );
		var data = {
			action: 'wishlist_remove',
			product_id: product_id
		};
		jQuery.post( woosw_vars.ajax_url, data, function( response ) {
			response = JSON.parse( response );
			if ( response['status'] == 1 ) {
				_this_item.remove();
				jQuery( '.woosw-btn-' + product_id ).removeClass( 'woosw-added' );
				jQuery( '.woosw-btn-' + product_id ).html( woosw_vars.button_text );
				if ( response['notice'] != null ) {
					jQuery( '#woosw-area .woosw-notice' ).html( response['notice'] );
					woosw_notice_show();
					setTimeout( function() {
						woosw_notice_hide();
					}, 3000 );
				}
			} else {
				if ( response['notice'] != null ) {
					jQuery( '#woosw-area .woosw-content-mid' ).html( '<div class="woosw-content-mid-notice">' + response['notice'] + '</div>' );
				}
			}
			if ( response['count'] != null ) {
				woosw_change_count( response['count'] );
			}
		} );
		e.preventDefault();
	} );

	jQuery( '#woosw-area' ).on( 'click tap', function( e ) {
		var woosw_content = jQuery( '.woosw-content' );
		if ( jQuery( e.target ).closest( woosw_content ).length == 0 ) {
			woosw_hide();
		}
	} );

	// continue
	jQuery( 'body' ).on( 'click tap', '.woosw-continue', function( e ) {
		woosw_hide();
		e.preventDefault();
	} );

	// close
	jQuery( 'body' ).on( 'click tap', '.woosw-close', function( e ) {
		woosw_hide();
		e.preventDefault();
	} );
} );

jQuery( window ).resize( function() {
	woosw_fix_height();
} );

function woosw_show() {
	jQuery( '#woosw-area' ).addClass( 'woosw-open' );
	jQuery( document.body ).trigger( 'woosw_show' );
	woosw_fix_height();
}

function woosw_hide() {
	jQuery( '#woosw-area' ).removeClass( 'woosw-open' );
	jQuery( document.body ).trigger( 'woosw_hide' );
}

function woosw_change_count( count ) {
	jQuery( '#woosw-area .woosw-count' ).html( count );
	jQuery( document.body ).trigger( 'woosw_change_count', [count] );
}

function woosw_notice_show() {
	jQuery( '#woosw-area .woosw-notice' ).addClass( 'woosw-notice-show' );
}

function woosw_notice_hide() {
	jQuery( '#woosw-area .woosw-notice' ).removeClass( 'woosw-notice-show' );
}

function woosw_fix_height() {
	var woosw_window_height = jQuery( window ).height();
	var $woosw_content = jQuery( '#woosw-area' ).find( '.woosw-content' );
	var $woosw_table = jQuery( '#woosw-area' ).find( '.woosw-content-items' );
	var woosw_content_height = $woosw_table.outerHeight() + 96;
	if (
		woosw_content_height < (
			woosw_window_height * .8
		) ) {
		if ( parseInt( woosw_content_height ) % 2 !== 0 ) {
			$woosw_content.height( parseInt( woosw_content_height ) - 1 );
		} else {
			$woosw_content.height( parseInt( woosw_content_height ) );
		}
	} else {
		if ( (
			     parseInt( woosw_window_height * .8 )
		     ) % 2 !== 0 ) {
			$woosw_content.height( parseInt( woosw_window_height * .8 ) - 1 );
		} else {
			$woosw_content.height( parseInt( woosw_window_height * .8 ) );
		}
	}
}