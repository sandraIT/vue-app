<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Kungfu_Sidebars' ) ) {
	class Kungfu_Sidebars {
		function __construct() {
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'wp_ajax_add_sidebar', array( $this, 'add_sidebar' ) );
			add_action( 'wp_ajax_remove_sidebar', array( $this, 'remove_sidebar' ) );
		}

		public function widgets_init() {

			$sidebars = $this->get_sidebars();
			if ( function_exists( 'register_sidebar' ) && is_array( $sidebars ) ) {
				foreach ( $sidebars as $sidebar ) {
					$sidebar_class = $this->remove_special_character( $sidebar );
					register_sidebar( array(
						'name'          => $sidebar,
						'id'            => strtolower( $sidebar_class ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h5 class="widget-title">',
						'after_title'   => '</h5>'
					) );
				}
			}
		}

		/**
		 * Adds menu item to admin menu
		 *
		 * @return    void
		 */
		function admin_menu( $buttons ) {
			add_submenu_page( 'insight-core', __( 'Sidebars', 'insight-core' ), __( 'Sidebars', 'insight-core' ), 'manage_options', 'insight-core-sidebars', array(
				$this,
				'output'
			) );
		}

		function enqueue_scripts() {
			$screen = get_current_screen();
			if ( strpos( $screen->id, 'page_insight-core-sidebars' ) !== false ) {
				wp_enqueue_script( 'kungfu-sidebars', plugin_dir_url( __FILE__ ) . 'js/kungfu-sidebars.js', array( 'jquery-core' ), false, true );
			}
		}

		function add_sidebar() {
			$sidebars = $this->get_sidebars();
			$name     = str_replace( array( "\n", "\r", "\t" ), '', $_POST['sidebar_name'] );

			$class = $this->remove_special_character( $name );
			$class = $this->remove_accents( $class );

			$response = array();

			if ( isset( $sidebars[ $class ] ) ) {
				$response['status']   = false;
				$response['messages'] = 'Sidebar already exists, please use a different name.';
			} else {
				$sidebars[ $class ] = $name;
				$this->update_sidebars( $sidebars );
				$response['status']   = true;
				$response['messages'] = $class;
			}
			echo json_encode( $response );
			wp_die();
		}

		function remove_sidebar() {
			$sidebars      = $this->get_sidebars();
			$sidebar_class = $_POST['sidebar_class'];

			$response = array();

			if ( ! isset( $sidebars[ $sidebar_class ] ) ) {
				$response['status']   = false;
				$response['messages'] = 'Sidebar does not exist.';
			} else {
				unset( $sidebars[ $sidebar_class ] );
				$this->update_sidebars( $sidebars );

				$response['status']   = true;
				$response['messages'] = '';
			}
			echo json_encode( $response );
			wp_die();
		}

		function output() {
			?>
			<div class="wrap">
				<h2><?php _e( 'Sidebars', 'insight-core' ); ?></h2>
				<div style="width:600px;">
					<table class="wp-list-table widefat striped" id="kungfu-table-sidebars">
						<thead>
						<tr>
							<th><?php _e( 'Sidebar Name', 'insight-core' ); ?></th>
							<th><?php _e( 'CSS Class', 'insight-core' ); ?></th>
							<th><?php _e( 'Remove', 'insight-core' ); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$sidebars = $this->get_sidebars();
						if ( is_array( $sidebars ) && ! empty( $sidebars ) ) {
							foreach ( $sidebars as $class => $sidebar ) {
								?>
								<tr>
									<td><?php echo $sidebar; ?></td>
									<td><?php echo $class; ?></td>
									<td><a href="javascript:void(0);" class="button kungfu-remove-sidebar"
									       data-sidebar="<?php echo $class; ?>"><i
												class="fa fa-remove"></i><?php _e( 'Remove', 'insight-core' ) ?></a>
									</td>
								</tr>
								<?php
							}
						} else { ?>
							<tr>
								<td colspan="3"><?php _e( 'No Sidebars defined', 'insight-core' ); ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<br/>
					<p>
						<input type="text" name="sidebar_name" id="sidebar_name"
						       placeholder="<?php _e( 'Sidebar Name', 'insight-core' ); ?>" class="widefat"/>
					</p>
					<p>
						<a href="javascript:void(0);" class="button button-primary" id="kungfu-add-sidebar"><i
								class="fa fa-plus"></i><?php _e( 'Add New Sidebar', 'insight-core' ); ?></a>
					</p>
				</div>
			</div>
			<?php
		}

		/**
		 * replaces array of sidebar names
		 */
		function update_sidebars( $sidebar_array ) {
			$sidebars = update_option( 'kungfu_sidebars', $sidebar_array );
		}

		/**
		 * gets the generated sidebars
		 */
		function get_sidebars() {
			$sidebars = get_option( 'kungfu_sidebars' );

			return $sidebars;
		}

		function remove_special_character( $name ) {
			$class = str_replace( array(
				' ',
				',',
				'.',
				'"',
				"'",
				'/',
				"\\",
				'+',
				'=',
				')',
				'(',
				'*',
				'&',
				'^',
				'%',
				'$',
				'#',
				'@',
				'!',
				'~',
				'`',
				'<',
				'>',
				'?',
				'[',
				']',
				'{',
				'}',
				'|',
				':',
			), '', $name );

			return $class;
		}

		/**
		 * Replace accented characters with non accented
		 *
		 * @param $str
		 *
		 * @return mixed
		 */
		function remove_accents( $str ) {
			$a = array(
				'À',
				'Á',
				'Â',
				'Ã',
				'Ä',
				'Å',
				'Æ',
				'Ç',
				'È',
				'É',
				'Ê',
				'Ë',
				'Ì',
				'Í',
				'Î',
				'Ï',
				'Ð',
				'Ñ',
				'Ò',
				'Ó',
				'Ô',
				'Õ',
				'Ö',
				'Ø',
				'Ù',
				'Ú',
				'Û',
				'Ü',
				'Ý',
				'ß',
				'à',
				'á',
				'â',
				'ã',
				'ä',
				'å',
				'æ',
				'ç',
				'è',
				'é',
				'ê',
				'ë',
				'ì',
				'í',
				'î',
				'ï',
				'ñ',
				'ò',
				'ó',
				'ô',
				'õ',
				'ö',
				'ø',
				'ù',
				'ú',
				'û',
				'ü',
				'ý',
				'ÿ',
				'Ā',
				'ā',
				'Ă',
				'ă',
				'Ą',
				'ą',
				'Ć',
				'ć',
				'Ĉ',
				'ĉ',
				'Ċ',
				'ċ',
				'Č',
				'č',
				'Ď',
				'ď',
				'Đ',
				'đ',
				'Ē',
				'ē',
				'Ĕ',
				'ĕ',
				'Ė',
				'ė',
				'Ę',
				'ę',
				'Ě',
				'ě',
				'Ĝ',
				'ĝ',
				'Ğ',
				'ğ',
				'Ġ',
				'ġ',
				'Ģ',
				'ģ',
				'Ĥ',
				'ĥ',
				'Ħ',
				'ħ',
				'Ĩ',
				'ĩ',
				'Ī',
				'ī',
				'Ĭ',
				'ĭ',
				'Į',
				'į',
				'İ',
				'ı',
				'Ĳ',
				'ĳ',
				'Ĵ',
				'ĵ',
				'Ķ',
				'ķ',
				'Ĺ',
				'ĺ',
				'Ļ',
				'ļ',
				'Ľ',
				'ľ',
				'Ŀ',
				'ŀ',
				'Ł',
				'ł',
				'Ń',
				'ń',
				'Ņ',
				'ņ',
				'Ň',
				'ň',
				'ŉ',
				'Ō',
				'ō',
				'Ŏ',
				'ŏ',
				'Ő',
				'ő',
				'Œ',
				'œ',
				'Ŕ',
				'ŕ',
				'Ŗ',
				'ŗ',
				'Ř',
				'ř',
				'Ś',
				'ś',
				'Ŝ',
				'ŝ',
				'Ş',
				'ş',
				'Š',
				'š',
				'Ţ',
				'ţ',
				'Ť',
				'ť',
				'Ŧ',
				'ŧ',
				'Ũ',
				'ũ',
				'Ū',
				'ū',
				'Ŭ',
				'ŭ',
				'Ů',
				'ů',
				'Ű',
				'ű',
				'Ų',
				'ų',
				'Ŵ',
				'ŵ',
				'Ŷ',
				'ŷ',
				'Ÿ',
				'Ź',
				'ź',
				'Ż',
				'ż',
				'Ž',
				'ž',
				'ſ',
				'ƒ',
				'Ơ',
				'ơ',
				'Ư',
				'ư',
				'Ǎ',
				'ǎ',
				'Ǐ',
				'ǐ',
				'Ǒ',
				'ǒ',
				'Ǔ',
				'ǔ',
				'Ǖ',
				'ǖ',
				'Ǘ',
				'ǘ',
				'Ǚ',
				'ǚ',
				'Ǜ',
				'ǜ',
				'Ǻ',
				'ǻ',
				'Ǽ',
				'ǽ',
				'Ǿ',
				'ǿ',
				'Ά',
				'ά',
				'Έ',
				'έ',
				'Ό',
				'ό',
				'Ώ',
				'ώ',
				'Ί',
				'ί',
				'ϊ',
				'ΐ',
				'Ύ',
				'ύ',
				'ϋ',
				'ΰ',
				'Ή',
				'ή'
			);
			$b = array(
				'A',
				'A',
				'A',
				'A',
				'A',
				'A',
				'AE',
				'C',
				'E',
				'E',
				'E',
				'E',
				'I',
				'I',
				'I',
				'I',
				'D',
				'N',
				'O',
				'O',
				'O',
				'O',
				'O',
				'O',
				'U',
				'U',
				'U',
				'U',
				'Y',
				's',
				'a',
				'a',
				'a',
				'a',
				'a',
				'a',
				'ae',
				'c',
				'e',
				'e',
				'e',
				'e',
				'i',
				'i',
				'i',
				'i',
				'n',
				'o',
				'o',
				'o',
				'o',
				'o',
				'o',
				'u',
				'u',
				'u',
				'u',
				'y',
				'y',
				'A',
				'a',
				'A',
				'a',
				'A',
				'a',
				'C',
				'c',
				'C',
				'c',
				'C',
				'c',
				'C',
				'c',
				'D',
				'd',
				'D',
				'd',
				'E',
				'e',
				'E',
				'e',
				'E',
				'e',
				'E',
				'e',
				'E',
				'e',
				'G',
				'g',
				'G',
				'g',
				'G',
				'g',
				'G',
				'g',
				'H',
				'h',
				'H',
				'h',
				'I',
				'i',
				'I',
				'i',
				'I',
				'i',
				'I',
				'i',
				'I',
				'i',
				'IJ',
				'ij',
				'J',
				'j',
				'K',
				'k',
				'L',
				'l',
				'L',
				'l',
				'L',
				'l',
				'L',
				'l',
				'l',
				'l',
				'N',
				'n',
				'N',
				'n',
				'N',
				'n',
				'n',
				'O',
				'o',
				'O',
				'o',
				'O',
				'o',
				'OE',
				'oe',
				'R',
				'r',
				'R',
				'r',
				'R',
				'r',
				'S',
				's',
				'S',
				's',
				'S',
				's',
				'S',
				's',
				'T',
				't',
				'T',
				't',
				'T',
				't',
				'U',
				'u',
				'U',
				'u',
				'U',
				'u',
				'U',
				'u',
				'U',
				'u',
				'U',
				'u',
				'W',
				'w',
				'Y',
				'y',
				'Y',
				'Z',
				'z',
				'Z',
				'z',
				'Z',
				'z',
				's',
				'f',
				'O',
				'o',
				'U',
				'u',
				'A',
				'a',
				'I',
				'i',
				'O',
				'o',
				'U',
				'u',
				'U',
				'u',
				'U',
				'u',
				'U',
				'u',
				'U',
				'u',
				'A',
				'a',
				'AE',
				'ae',
				'O',
				'o',
				'Α',
				'α',
				'Ε',
				'ε',
				'Ο',
				'ο',
				'Ω',
				'ω',
				'Ι',
				'ι',
				'ι',
				'ι',
				'Υ',
				'υ',
				'υ',
				'υ',
				'Η',
				'η'
			);

			return str_replace( $a, $b, $str );
		}
	}

	new Kungfu_Sidebars;
}