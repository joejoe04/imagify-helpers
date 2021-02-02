<?php
/**
 * Plugin Name: Imagify | Change Bulk Buffer Size
 * Description: In Imagify’s bulk optimization, set the number of parallel optimizations to 1 for all contexts.
 * Plugin URI:  https://github.com/wp-media/imagify-helpers/tree/master/optimization/imagify-bulk-optimization-buffer/
 * Author: 			WP Media
 * Author URI: 	https://wp-media.me/
 * Licence: 		GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright SAS WP Media 2019
 */

namespace ImagifyPlugin\Helpers\optimization\change_bulk_buffer_size;

// Standard plugin security, keep this line in place.
defined( 'ABSPATH' ) || die();

function buffer_sizes( $buffer_sizes ) {
	if ( ! $buffer_sizes || ! is_array( $buffer_sizes ) ) {
		return [];
	}
	return array_fill_keys( array_keys( $buffer_sizes ), 1 );
}
add_filter( 'imagify_bulk_buffer_sizes', __NAMESPACE__ . '\buffer_sizes', 10, 3 );