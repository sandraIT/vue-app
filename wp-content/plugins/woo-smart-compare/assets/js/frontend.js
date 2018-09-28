var wooscpResizeTimer = 0;
var wooscpSearchTimer = 0;

jQuery( document ).ready( function() {
	wooscpLoadColor();
	wooscpLoadCompareBar( 'first' );
	wooscpChangeCount( 'first' );
	wooscpCheckButtons();

	// remove all
	jQuery( '.wooscp-bar-remove' ).on( 'click', function() {
		var r = confirm( wooscpVars.remove_all );
		if ( r == true ) {
			wooscpRemoveProduct( 'all' );
			wooscpLoadCompareBar();
			wooscpLoadCompareTable();
		}
	} );

	// rearrange
	jQuery( document ).on( 'wooscpDragEndEvent', function() {
		wooscpSaveProducts();
	} );

	// add
	jQuery( 'body' ).on( 'click', '.wooscp-btn', function( e ) {
		var product_id = jQuery( this ).attr( 'data-id' );
		if ( jQuery( this ).hasClass( 'wooscp-btn-added' ) ) {
			if ( wooscpVars.click_again == 'yes' ) {
				// remove
				wooscpRemoveProduct( product_id );
				wooscpLoadCompareBar();
				wooscpLoadCompareTable();
			} else {
				if ( jQuery( '.wooscp-bar-items' ).hasClass( 'wooscp-bar-items-loaded' ) ) {
					wooscpOpenCompareBar();
				} else {
					wooscpLoadCompareBar();
				}
				if ( ! jQuery( '.wooscp-table-items' ).hasClass( 'wooscp-table-items-loaded' ) ) {
					wooscpLoadCompareTable();
				}
			}
		} else {
			jQuery( this ).addClass( 'wooscp-btn-adding' );
			wooscpAddProduct( product_id );
			wooscpLoadCompareBar();
			wooscpLoadCompareTable();
		}
		if ( wooscpVars.open_table == 'yes' ) {
			wooscpToggleCompareTable();
		}
		e.preventDefault();
	} );

	// remove
	jQuery( '#wooscp-area' ).on( 'click', '.wooscp-bar-item-remove', function( e ) {
		var product_id = jQuery( this ).attr( 'data-id' );
		jQuery( this ).parent().addClass( 'removing' );
		wooscpRemoveProduct( product_id );
		wooscpLoadCompareBar();
		wooscpLoadCompareTable();
		wooscpCheckButtons();
		e.preventDefault();
	} );

	// compare bar button
	jQuery( '.wooscp-bar-btn' ).on( 'click', function() {
		wooscpToggleCompareTable();
	} );

	// close compare
	jQuery( document ).on( 'click', function( e ) {
		if ( (
			     wooscpVars.click_outside == 'yes'
		     ) && (
			     jQuery( e.target ).closest( '.wooscp-search' ).length == 0
		     ) && (
			     jQuery( e.target ).closest( '.wooscp-btn' ).length == 0
		     ) && (
			     jQuery( e.target ).closest( '.wooscp-table' ).length == 0
		     ) && (
			     jQuery( e.target ).closest( '.wooscp-bar' ).length == 0
		     ) && (
			     jQuery( e.target ).closest( '.wooscp-menu-item a' ).length == 0
		     ) && (
			     (
				     wooscpVars.open_button == ''
			     ) || (
				     jQuery( e.target ).closest( wooscpVars.open_button ).length == 0
			     )
		     ) ) {
			wooscpCloseCompare();
		}
	} );

	// close
	jQuery( '#wooscp-table-close' ).on( 'click', function() {
		wooscpCloseCompareTable();
	} );

	// open button
	if ( wooscpVars.open_button != '' ) {
		jQuery( 'body' ).on( 'click', wooscpVars.open_button, function() {
			wooscpToggleCompare();
		} );
	}

	// menu item
	jQuery( 'body' ).on( 'click', '.wooscp-menu-item a', function( e ) {
		if ( jQuery( '.wooscp-bar-items' ).hasClass( 'wooscp-bar-items-loaded' ) ) {
			wooscpOpenCompareBar();
		} else {
			wooscpLoadCompareBar();
		}
		if ( ! jQuery( '.wooscp-table-items' ).hasClass( 'wooscp-table-items-loaded' ) ) {
			wooscpLoadCompareTable();
		}
		wooscpOpenCompareTable();
		e.preventDefault();
	} );
} );

jQuery( window ).resize( function() {
	clearTimeout( wooscpResizeTimer );
	wooscpResizeTimer = setTimeout( 'wooscpLoadCompareTable()', 500 );
} );

function wooscpAjaxSearch() {
	jQuery( '.wooscp-search-result' ).html( '' ).addClass( 'loading' );
	// ajax search product
	wooscpSearchTimer = null;
	data = {
		action: 'wooscp_search',
		keyword: jQuery( '#wooscp_search_input' ).val(),
		nonce: wooscpVars.nonce
	};
	jQuery.post( wooscpVars.ajaxurl, data, function( response ) {
		jQuery( '.wooscp-search-result' ).html( response ).removeClass( 'loading' );
	} );
}

function wooscpSetCookie( cname, cvalue, exdays ) {
	var d = new Date();
	d.setTime( d.getTime() + (
		exdays * 24 * 60 * 60 * 1000
	) );
	var expires = 'expires=' + d.toUTCString();
	document.cookie = cname + '=' + cvalue + '; ' + expires + '; path=/';
}

function wooscpGetCookie( cname ) {
	var name = cname + '=';
	var ca = document.cookie.split( ';' );
	for ( var i = 0; i < ca.length; i ++ ) {
		var c = ca[i];
		while ( c.charAt( 0 ) == ' ' ) {
			c = c.substring( 1 );
		}
		if ( c.indexOf( name ) == 0 ) {
			return decodeURIComponent( c.substring( name.length, c.length ) );
		}
	}
	return '';
}

function wooscpGetProducts() {
	var wooscpCookie = 'wooscp_products';
	if ( wooscpVars.user_id != '' ) {
		wooscpCookie = 'wooscp_products_' + wooscpVars.user_id;
	}
	if ( wooscpGetCookie( wooscpCookie ) != '' ) {
		return wooscpGetCookie( wooscpCookie );
	} else {
		return '';
	}
}

function wooscpSaveProducts() {
	var wooscpCookie = 'wooscp_products';
	if ( wooscpVars.user_id != '' ) {
		wooscpCookie = 'wooscp_products_' + wooscpVars.user_id;
	}
	var wooscpProducts = new Array();
	jQuery( '.wooscp-bar-item' ).each( function() {
		var eID = jQuery( this ).attr( 'data-id' );
		if ( eID != '' ) {
			wooscpProducts.push( eID );
		}
	} );
	var wooscpProductsStr = wooscpProducts.join();
	wooscpSetCookie( wooscpCookie, wooscpProductsStr, 7 );
	wooscpLoadCompareTable();
}

function wooscpAddProduct( product_id ) {
	var wooscpCookie = 'wooscp_products';
	var wooscpCount = 0;
	if ( wooscpVars.user_id != '' ) {
		wooscpCookie = 'wooscp_products_' + wooscpVars.user_id;
	}
	if ( wooscpGetCookie( wooscpCookie ) != '' ) {
		var wooscpProducts = wooscpGetCookie( wooscpCookie ).split( ',' );
		wooscpProducts = jQuery.grep( wooscpProducts, function( value ) {
			return value != product_id;
		} );
		wooscpProducts.unshift( product_id );
		var wooscpProductsStr = wooscpProducts.join();
		wooscpSetCookie( wooscpCookie, wooscpProductsStr, 7 );
		wooscpCount = wooscpProducts.length;
	} else {
		wooscpSetCookie( wooscpCookie, product_id, 7 );
		wooscpCount = 1;
	}
	jQuery( '.wooscp-btn-' + product_id ).removeClass( 'wooscp-btn-adding' ).addClass( 'wooscp-btn-added' );
	wooscpChangeCount( wooscpCount );
	jQuery( document.body ).trigger( 'wooscp_added', [wooscpCount] );
}

function wooscpRemoveProduct( product_id ) {
	var wooscpCookie = 'wooscp_products';
	var wooscpCount = 0;
	if ( wooscpVars.user_id != '' ) {
		wooscpCookie = 'wooscp_products_' + wooscpVars.user_id;
	}
	if ( product_id != 'all' ) {
		// remove one
		if ( wooscpGetCookie( wooscpCookie ) != '' ) {
			var wooscpProducts = wooscpGetCookie( wooscpCookie ).split( ',' );
			wooscpProducts = jQuery.grep( wooscpProducts, function( value ) {
				return value != product_id;
			} );
			var wooscpProductsStr = wooscpProducts.join();
			wooscpSetCookie( wooscpCookie, wooscpProductsStr, 7 );
			wooscpCount = wooscpProducts.length;
		}
		jQuery( '.wooscp-btn-' + product_id ).removeClass( 'wooscp-btn-added' );
	} else {
		// remove all
		if ( wooscpGetCookie( wooscpCookie ) != '' ) {
			wooscpSetCookie( wooscpCookie, '', 7 );
			wooscpCount = 0;
		}
		jQuery( '.wooscp-btn' ).removeClass( 'wooscp-btn-added' );
	}
	wooscpChangeCount( wooscpCount );
	jQuery( document.body ).trigger( 'wooscp_removed', [wooscpCount] );
}

function wooscpCheckButtons() {
	var wooscpCookie = 'wooscp_products';
	if ( wooscpVars.user_id != '' ) {
		wooscpCookie = 'wooscp_products_' + wooscpVars.user_id;
	}
	if ( wooscpGetCookie( wooscpCookie ) != '' ) {
		var wooscpProducts = wooscpGetCookie( wooscpCookie ).split( ',' );
		jQuery( '.wooscp-btn' ).removeClass( 'wooscp-btn-added' );
		wooscpProducts.forEach( function( entry ) {
			jQuery( '.wooscp-btn-' + entry ).addClass( 'wooscp-btn-added' );
		} );
	}
}

function wooscpLoadCompareBar( open ) {
	var data = {
		action: 'wooscp_load_compare_bar',
		products: wooscpGetProducts(),
		nonce: wooscpVars.nonce
	};
	jQuery.post( wooscpVars.ajaxurl, data, function( response ) {
		if ( (
			     wooscpVars.hide_empty == 'yes'
		     ) && (
			     (
				     response == ''
			     ) || (
				     response == 0
			     )
		     ) ) {
			jQuery( '.wooscp-bar-items' ).removeClass( 'wooscp-bar-items-loaded' );
			wooscpCloseCompareBar();
			wooscpCloseCompareTable();
		} else {
			if ( (
				     typeof open == 'undefined'
			     ) || (
				     (
					     open == 'first'
				     ) && (
					     jQuery( '#wooscp-area' ).attr( 'data-bar-open' ) == 'yes'
				     )
			     ) ) {
				jQuery( '.wooscp-bar-items' ).html( response ).addClass( 'wooscp-bar-items-loaded' );
				wooscpOpenCompareBar();
			}
		}
	} );
}

function wooscpOpenCompareBar() {
	jQuery( '.wooscp-bar' ).addClass( 'wooscp-bar-open' );
	jQuery( '.wooscp-bar-item' ).arrangeable( {
		dragSelector: 'img',
		dragEndEvent: 'wooscpDragEndEvent',
	} );
	jQuery( document.body ).trigger( 'wooscp_bar_open' );
}

function wooscpCloseCompareBar() {
	jQuery( '.wooscp-bar' ).removeClass( 'wooscp-bar-open' );
	jQuery( document.body ).trigger( 'wooscp_bar_close' );
}

function wooscpLoadCompareTable() {
	jQuery( '.wooscp-table-inner' ).addClass( 'loading' );
	var data = {
		action: 'wooscp_load_compare_table',
		products: wooscpGetProducts(),
		nonce: wooscpVars.nonce
	};
	jQuery.post( wooscpVars.ajaxurl, data, function( response ) {
		jQuery( '.wooscp-table-items' ).html( response ).addClass( 'wooscp-table-items-loaded' );
		if ( jQuery( window ).width() >= 768 ) {
			jQuery( '#wooscp_table' ).tableHeadFixer( {'head': true, left: 1} );
		} else {
			jQuery( '#wooscp_table' ).tableHeadFixer( {'head': true} );
		}
		jQuery( '.wooscp-table-items' ).perfectScrollbar( {theme: 'wooscp'} );
		jQuery( '.wooscp-table-inner' ).removeClass( 'loading' );
		wooscpHideEmptyRow();
	} );
}

function wooscpOpenCompareTable() {
	jQuery( '.wooscp-table' ).addClass( 'wooscp-table-open' );
	jQuery( '.wooscp-bar-btn' ).addClass( 'wooscp-bar-btn-open' );
	if ( ! jQuery.trim( jQuery( '.wooscp-table-items' ).html() ).length ) {
		wooscpLoadCompareTable();
	}
	jQuery( document.body ).trigger( 'wooscp_table_open' );
}

function wooscpCloseCompareTable() {
	jQuery( '#wooscp-area' ).removeClass( 'wooscp-area-open' );
	jQuery( '.wooscp-table' ).removeClass( 'wooscp-table-open' );
	jQuery( '.wooscp-bar-btn' ).removeClass( 'wooscp-bar-btn-open' );
	jQuery( document.body ).trigger( 'wooscp_table_close' );
}

function wooscpToggleCompareTable() {
	if ( jQuery( '.wooscp-table' ).hasClass( 'wooscp-table-open' ) ) {
		wooscpCloseCompareTable();
	} else {
		wooscpOpenCompareTable();
	}
}

function wooscpOpenCompare() {
	jQuery( '#wooscp-area' ).addClass( 'wooscp-area-open' );
	wooscpLoadCompareBar();
	wooscpLoadCompareTable();
	wooscpOpenCompareBar();
	wooscpOpenCompareTable();
	jQuery( document.body ).trigger( 'wooscp_open' );
}

function wooscpCloseCompare() {
	jQuery( '#wooscp-area' ).removeClass( 'wooscp-area-open' );
	wooscpCloseCompareBar();
	wooscpCloseCompareTable();
	jQuery( document.body ).trigger( 'wooscp_close' );
}

function wooscpToggleCompare() {
	if ( jQuery( '#wooscp-area' ).hasClass( 'wooscp-area-open' ) ) {
		wooscpCloseCompare();
	} else {
		wooscpOpenCompare();
	}
	jQuery( document.body ).trigger( 'wooscp_toggle' );
}

function wooscpLoadColor() {
	var bg_color = jQuery( '#wooscp-area' ).attr( 'data-bg-color' );
	var btn_color = jQuery( '#wooscp-area' ).attr( 'data-btn-color' );
	jQuery( '.wooscp-table' ).css( 'background-color', bg_color );
	jQuery( '.wooscp-bar' ).css( 'background-color', bg_color );
	jQuery( '.wooscp-bar-btn' ).css( 'background-color', btn_color );
}

function wooscpChangeCount( count ) {
	if ( count == 'first' ) {
		var products = wooscpGetProducts();
		if ( products != '' ) {
			var products_arr = products.split( ',' );
			count = products_arr.length;
		} else {
			count = 0;
		}
	}
	jQuery( '.wooscp-menu-item' ).each( function() {
		if ( jQuery( this ).hasClass( 'menu-item-type-wooscp' ) ) {
			jQuery( this ).find( '.wooscp-menu-item-inner' ).attr( 'data-count', count );
		} else {
			jQuery( this ).addClass( 'menu-item-type-wooscp' ).find( 'a' ).wrapInner( '<span class="wooscp-menu-item-inner" data-count="' + count + '"></span>' );
		}
	} );
	jQuery( '.wooscp-bar' ).attr( 'data-count', count );
	jQuery( document.body ).trigger( 'wooscp_change_count', [count] );
}

function wooscpHideEmptyRow() {
	jQuery( '#wooscp_table tbody tr' ).each( function() {
		var _td = 0;
		var _td_empty = 0;
		jQuery( this ).find( 'td' ).each( function() {
			if ( (
				     _td > 0
			     ) && (
				     jQuery( this ).html().length > 0
			     ) ) {
				_td_empty = 1;
			}
			_td ++;
		} );
		if ( _td_empty == 0 ) {
			jQuery( this ).hide();
		}
	} );
}