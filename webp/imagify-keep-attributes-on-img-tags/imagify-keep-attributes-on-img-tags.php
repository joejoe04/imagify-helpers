<?php
/**
 * Plugin Name: Imagify | Keep Attributes On img Tags
 * Description: Keeps attributes on img tags rather than being moved to picture tags.
 * Plugin URI:  https://github.com/wp-media/imagify-helpers/tree/master/optimization/imagify-keep-attributes-on-img-tags/
 * Author: 			WP Media
 * Author URI: 	https://wp-media.me/
 * Licence: 		GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright SAS WP Media 2020
 */

namespace Imagify\Helpers\webp\keep_attributes_on_img_tags;

// Standard plugin security, keep this line in place.
defined( 'ABSPATH' ) || die();

/**
 * Stop attributes from being added to picture tags
 *
 * @author Joe DiSalvo
 */
function keep_attributes_off_picture_tags( $attributes ) {
	return [];
}
add_filter( 'imagify_picture_attributes', __NAMESPACE__ . '\keep_attributes_off_picture_tags' );

/**
 * Keep the attributes on the img tags
 *
 * @author Joe DiSalvo
 */
function keep_attributes_on_img_tags ( $attributes, $image ) {
	if ( is_array( $image ) && is_array( $image['attributes'] ) ) {
		foreach( $image['attributes'] as $attribute => $attribute_val ) {
			$attributes[$attribute] = $attribute_val;
		}
		return $attributes;
	}
}
add_filter( 'imagify_picture_img_attributes', __NAMESPACE__ . '\keep_attributes_on_img_tags', 10, 2 );