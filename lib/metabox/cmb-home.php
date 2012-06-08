<?php 

// example setup

// make sure to rename filter and the function call to a unique name

function cmb_home( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'cr_home_';

	$meta_boxes[] = array(
		'id'         => 'home_metabox',
		'title'      => 'Home Options (uses slider)',
		'pages'      => array( 'page', ), // Post type (ex. page, post, post name)
		'show_on'    => array( 'key' => 'page-template', 'value' => 'template-home.php' ),
		'context' => 'normal', //  'normal', 'advanced', or 'side'
		'priority' => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
		//welcome box
			array(
				'name' => 'Welcome box',
				'desc' => 'Text will display below the slider area, great spot for announcements.',
				'id'   => $prefix . 'header_welcome',
				'type' => 'title',
			),
			array(
				'name' => 'Display home welcome text?',
				'desc' => '',
				'id'   => $prefix . 'show_welcome',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Welcome Text',
				'desc' => 'Use a <span> for emphasis on words (excepts html markup)',
				'id'   => $prefix . 'hello',
				'type' => 'textarea_code',
			),
			
		// home buckets
			array(
				'name' => 'Home Buckets',
				'desc' => 'Three containers to use at your will. Each field is ',
				'id'   => $prefix . 'header_buckets',
				'type' => 'title',
			),
			array(
				'name' => 'Display home buckets?',
				'desc' => '',
				'id'   => $prefix . 'show_buckets',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Bucket 1 image',
				'desc' => '',
				'id'   => $prefix . 'bucket1_img',
				'type' => 'file',
			),
			array(
				'name' => 'link for bucket 1 image',
				'desc' => '(ex. http://google.com )',
				'id'   => $prefix . 'bucket1_img_link',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Bucket 1 title',
				'desc' => '',
				'id'   => $prefix . 'bucket1_title',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Bucket 1 text',
				'desc' => 'html permitted',
				'id'   => $prefix . 'bucket1_text',
				'type' => 'textarea_code',
			),	
			array(
				'name' => 'Bucket 2 image',
				'desc' => '',
				'id'   => $prefix . 'bucket2_img',
				'type' => 'file',
			),
			array(
				'name' => 'link for bucket 2 image',
				'desc' => '(ex. http://bing.com )',
				'id'   => $prefix . 'bucket2_img_link',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Bucket 2 title',
				'desc' => '',
				'id'   => $prefix . 'bucket2_title',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Bucket 2 text',
				'desc' => 'html permitted',
				'id'   => $prefix . 'bucket2_text',
				'type' => 'textarea_code',
			),
			array(
				'name' => 'Bucket 3 image',
				'desc' => '',
				'id'   => $prefix . 'bucket3_img',
				'type' => 'file',
			),
			array(
				'name' => 'link for bucket 3 image',
				'desc' => '(ex. http://yahoo.com )',
				'id'   => $prefix . 'bucket3_img_link',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Bucket 3 title',
				'desc' => '',
				'id'   => $prefix . 'bucket3_title',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Bucket 3 text',
				'desc' => 'html permitted',
				'id'   => $prefix . 'bucket3_text',
				'type' => 'textarea_code',
			),
			
	 // Call to action box
			array(
				'name' => 'Call To action box',
				'desc' => 'A simple box to display headline, some text and a call to action',
				'id'   => $prefix . 'header_ctab',
				'type' => 'title',
			),
			array(
				'name' => 'Display call to action Box?',
				'desc' => '',
				'id'   => $prefix . 'show_ctab',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Call to action title',
				'desc' => '',
				'id'   => $prefix . 'ctab_title',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Call to action Sub title',
				'desc' => 'Short description',
				'id'   => $prefix . 'ctab_text',
				'type' => 'text',
			),
			array(
				'name' => 'URL for button',
				'desc' => '(ex. http://google.com )',
				'id'   => $prefix . 'ctab_url',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Text for Button',
				'desc' => '',
				'id'   => $prefix . 'ctab_url_text',
				'type' => 'text_medium',
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'cmb_meta_boxes', 'cmb_home' );

?>