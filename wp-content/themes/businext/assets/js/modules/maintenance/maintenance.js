(
	function( $ ) {
		'use strict';

		var $countDown = $( '#countdown' );

		$( window ).on( 'resize', function() {
			if ( $countDown.length > 0 ) {
				$countDown.TimeCircles().rebuild();
			}

			maintenanceFullHeight();
		} );

		$( document ).ready( function() {
			maintenanceFullHeight();
			maintenanceCountdown();
		} );

		function maintenanceCountdown() {
			if ( $countDown.length > 0 ) {
				var settings = $countDown.data();
				console.log( settings );

				var color = settings.color ? settings.color : '#00D2DD';
				var dayText = settings.dayText ? settings.dayText : 'Days';
				var hourText = settings.hourText ? settings.hourText : 'Hours';
				var minuteText = settings.minuteText ? settings.minuteText : 'Minutes';
				var secondText = settings.secondText ? settings.secondText : 'Seconds';

				var options = {
					circle_bg_color: 'rgba(255, 255, 255, 0.3)',
					fg_width: 0.03,
					bg_width: 1,
					direction: 'Counter-clockwise',
					time: {
						Days: {
							color: color,
							text: dayText
						},
						Hours: {
							color: color,
							text: hourText
						},
						Minutes: {
							color: color,
							text: minuteText
						},
						Seconds: {
							color: color,
							text: secondText
						}
					}
				};

				$countDown.TimeCircles( options );
			}
		}

		function maintenanceFullHeight() {
			var page = $( '#maintenance-wrap' );
			var height = $( window ).height();
			var adminBar = $( '#wpadminbar' );
			if ( adminBar ) {
				height -= adminBar.outerHeight();
			}

			var $header = $( '#page-header' );
			var $footer = $( '#page-footer' )

			if ( ! $header.hasClass( 'header-layout-fixed' ) ) {
				height -= $header.outerHeight();
			}

			console.log( $footer.outerHeight() );

			if ( $footer ) {
				height -= $footer.outerHeight();
			}

			page.css( {
				'minHeight': height
			} );
		}
	}( window.jQuery )
);
