<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category Created
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */


// Slider meta box
require_once 'cmb-slider.php';

// Home page template meta box
require_once 'cmb-home.php';

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );

// make em sing
function cmb_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';
} ?>