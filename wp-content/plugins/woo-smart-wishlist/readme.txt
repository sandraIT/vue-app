=== WooCommerce Smart Wishlist ===
Contributors: wpclever
Donate link: https://wpclever.net
Tags: woocommerce, woo, smart, wishlist
Requires at least: 4.0
Tested up to: 4.9.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WooCommerce Smart Wishlist is a simple but powerful tool that can help your customer save products for buy later.

== Description ==

WooCommerce Smart Wishlist is a simple but powerful tool that can help your customer save products for buy later.

= Live demo =

Click to see [live demo](http://demo.wpclever.net/?item=woosw "live demo")

= Features =

- Custom position for button
- Support shortcode
- WPML integration

= Translators =

Available Languages

- English (Default)

If you have created your own language pack, or have an update for an existing one, you can send [gettext PO and MO file](http://codex.wordpress.org/Translating_WordPress "Translating WordPress") to [us](https://wpclever.net/contact "WPclever.net") so we can bundle it into WooCommerce Smart Wishlist.

= Need support? =

Visit [plugin documentation website](https://wpclever.net "plugin documentation")

== Installation ==

1. Please make sure that you installed WooCommerce
2. Go to plugins in your dashboard and select "Add New"
3. Search for "WooCommerce Smart Wishlist", Install & Activate it
4. Go to settings page to choose position and effect as you want

== Frequently Asked Questions ==

= How to integrate with my theme? =

To integrate with a theme, please use bellow filter to hide the default buttons.

`add_filter( 'woosw_button_position_archive', function() {
    return '0';
} );
add_filter( 'woosw_button_position_single', function() {
    return '0';
} );`

After that, use the shortcode to display the button where you want.

`echo do_shortcode('[woosw id="{product_id}"]');`

== Changelog ==

= 1.2.5 =
* Fixed: Error when WooCommerce is not active

= 1.2.4 =
* Fixed: JS trigger
* Updated: Compatible with WooCommerce 3.4.5

= 1.2.3 =
* Updated: Settings page style

= 1.2.2 =
* Added option to change the color
* Compatible with WooCommerce 3.4.2

= 1.2.1 =
* Add JS trigger when show/hide or changing the count

= 1.2.0 =
* Optimized the code

= 1.1.6 =
* Fix some minor CSS issues

= 1.1.5 =
* Fix the PHP notice

= 1.1.4 =
* Compatible with WooCommerce 3.3.5

= 1.1.3 =
* Compatible with WordPress 4.9.5

= 1.1.2 =
* Added: Button text for "added" state
* Added: WPML integration
* Fixed: Fix the height of popup to prevent blur

= 1.1.1 =
* Compatible with WordPress 4.9.4
* Compatible with WooCommerce 3.3.1

= 1.1.0 =
* Added: Auto create the Wishlist page with shortcode

= 1.0.4 =
* Fix share URLs

= 1.0.3 =
* Add share buttons on wishlist page

= 1.0.2 =
* Update wishlist page

= 1.0.1 =
* Update CSS

= 1.0 =
* Released