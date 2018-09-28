(
	function( $ ) {
		$.fn.insightSwiper = function() {

			this.each( function() {

				var $slider = $( this );
				var _settings = $slider.data();

				if ( _settings.queueInit == '0' ) {
					return;
				}

				var $sliderContainer = $slider.children( '.swiper-container' ).first(),
				    lgItems          = _settings.lgItems ? _settings.lgItems : 1,
				    mdItems          = _settings.mdItems ? _settings.mdItems : lgItems,
				    smItems          = _settings.smItems ? _settings.smItems : mdItems,
				    xsItems          = _settings.xsItems ? _settings.xsItems : smItems,
				    lgGutter         = _settings.lgGutter ? _settings.lgGutter : 0,
				    mdGutter         = _settings.mdGutter ? _settings.mdGutter : lgGutter,
				    smGutter         = _settings.smGutter ? _settings.smGutter : mdGutter,
				    xsGutter         = _settings.xsGutter ? _settings.xsGutter : smGutter,
				    speed            = _settings.speed ? _settings.speed : 1000;

				if ( _settings.slideWrap ) {
					$slider.children( '.swiper-container' )
					       .children( '.swiper-wrapper' )
					       .children( 'div' )
					       .wrap( "<div class='swiper-slide'></div>" );
				}

				if ( lgItems == 'auto' ) {
					var _options = {
						slidesPerView: 'auto',
						spaceBetween: lgGutter,
						breakpoints: {
							767: {
								spaceBetween: xsGutter
							},
							990: {
								spaceBetween: smGutter
							},
							1199: {
								spaceBetween: mdGutter
							}
						}
					};
				} else {
					var _options = {
						slidesPerView: lgItems, //slidesPerGroup: lgItems,
						spaceBetween: lgGutter,
						breakpoints: {
							// when window width is <=
							767: {
								slidesPerView: xsItems,
								spaceBetween: xsGutter
							},
							990: {
								slidesPerView: smItems,
								spaceBetween: smGutter
							},
							1199: {
								slidesPerView: mdItems,
								spaceBetween: mdGutter
							}
						}
					};

					if ( _settings.slidesPerGroup == 'inherit' ) {
						_options.slidesPerGroup = lgItems;

						_options.breakpoints[ 767 ].slidesPerGroup = xsItems;
						_options.breakpoints[ 990 ].slidesPerGroup = smItems;
						_options.breakpoints[ 1199 ].slidesPerGroup = mdItems;
					}
				}

				_options.el = $sliderContainer;

				_options.watchOverflow = true;

				if ( _settings.slideColumns ) {
					_options.slidesPerColumn = _settings.slideColumns;
				}

				if ( _settings.autoHeight ) {
					_options.autoHeight = true;
				}

				if ( speed ) {
					_options.speed = speed;
				}

				// Maybe: fade, flip
				if ( _settings.effect ) {
					_options.effect = _settings.effect;
					/*_options.fadeEffect = {
						crossFade: true
					};*/

					if ( _settings.effect === 'coverflow' ) {
						_options.coverflowEffect = {
							slideShadows: false,
							stretch: 40,
							depth: 100,
							rotate: 10,
							modifier: 3
						};
					}
				}

				if ( _settings.loop ) {
					_options.loop = true;
				}

				if ( _settings.centered ) {
					_options.centeredSlides = true;
				}

				if ( _settings.autoplay ) {
					_options.autoplay = {
						delay: _settings.autoplay,
						disableOnInteraction: false
					};
				}

				var $wrapTools;

				if ( _settings.wrapTools ) {
					$wrapTools = $( '<div class="swiper-tools"></div>' );

					$slider.append( $wrapTools );
				}

				if ( _settings.nav ) {

					if ( _settings.customNav && _settings.customNav !== '' ) {
						$customBtn = $( '#' + _settings.customNav );
						var $swiperPrev = $customBtn.find( '.slider-prev-btn' );
						var $swiperNext = $customBtn.find( '.slider-next-btn' );
					} else {
						var $swiperPrev = $( '<div class="swiper-nav-button swiper-button-prev"><i class="nav-button-icon"></i></div>' );
						var $swiperNext = $( '<div class="swiper-nav-button swiper-button-next"><i class="nav-button-icon"></i></div>' );

						if ( $wrapTools ) {
							$wrapTools.append( $swiperPrev ).append( $swiperNext );
						} else {
							$slider.append( $swiperPrev ).append( $swiperNext );
						}
					}

					_options.navigation = {
						nextEl: $swiperNext,
						prevEl: $swiperPrev
					};
				}

				var $swiperPagination;

				if ( _settings.pagination ) {
					$swiperPagination = $( '<div class="swiper-pagination"></div>' );
					$slider.addClass( 'has-pagination' );

					if ( $wrapTools ) {
						$wrapTools.append( $swiperPagination );
					} else {
						$slider.append( $swiperPagination );
					}

					_options.pagination = {
						el: $swiperPagination,
						clickable: true
					};

					if ( _settings.hasOwnProperty( 'paginationType' ) ) {
						_options.pagination.type = _settings.paginationType;
					}

					if ( _settings.hasOwnProperty( 'paginationBullets' ) && _settings.paginationBullets === 'number' ) {
						_options.pagination.renderBullet = function( index, className ) {

							var number = index + 1;

							return '<span class="' + className + '"><i>' + number + '</i></span>';
						};
					}

				}

				if ( _settings.scrollbar ) {
					var $scrollbar = $( '<div class="swiper-scrollbar"></div>' );
					$sliderContainer.prepend( $scrollbar );

					_options.scrollbar = {
						el: $scrollbar,
						draggable: true,
					};

					_options.loop = false;
				}

				if ( _settings.mousewheel ) {
					_options.mousewheel = {
						enabled: true
					};
				}

				if ( _settings.vertical ) {
					_options.direction = 'vertical'
				}

				/*_options.on = {
					init: function () {
						// Hide pagination if has just only item.
						if ( $swiperPagination && $swiperPagination.children().length <= 1 ) {
							$slider.addClass( 'disable-pagination' );
						} else {
							$slider.removeClass( 'disable-pagination' );
						}
					}
				};*/

				var $swiper = new Swiper( _options );

				if ( _settings.reinitOnResize ) {
					var _timer;
					$( window ).resize( function() {
						clearTimeout( _timer );

						_timer = setTimeout( function() {
							$swiper.destroy( true, true );

							$swiper = new Swiper( $sliderContainer, _options );
						}, 300 );
					} );
				}

				// Disabled auto play when focus.
				if ( _settings.autoplay ) {
					$sliderContainer.hover( function() {
						$swiper.autoplay.stop();
					}, function() {
						$swiper.autoplay.start();
					} );
				}

				$( document ).trigger( 'insightSwiperInit', [ $swiper, $slider, _options ] );

				/*$swiper.on( 'resize', function () {
					// Hide pagination if has just only item.
					if ( $swiperPagination && $swiperPagination.children().length <= 1 ) {
						$slider.addClass( 'disable-pagination' );
					} else {
						$slider.removeClass( 'disable-pagination' );
					}
				} );*/

				return this;
			} );
		};
	}( jQuery )
);

jQuery( document ).ready( function( $ ) {
	'use strict';
