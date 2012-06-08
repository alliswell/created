<?php 

// Custom Meta Box for Created Theme slider

function cr_slider( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'cr_slider_';

	$meta_boxes[] = array(
		'id'         => 'created_cmb',
		'title'      => 'Slider Options',
		'pages'      => array( 'Slider' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Display title?',
				'desc' => 'Show title and body content',
				'id'   => $prefix . 'show_caption',
				'type' => 'checkbox',
			),			
			array(
				'name' => 'Link URL',
				'desc' => 'link the slide to url',
				'id'   => $prefix . 'link',
				'type' => 'text',
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_filter( 'cmb_meta_boxes', 'cr_slider' );

?>