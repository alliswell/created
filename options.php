<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'created_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'created_theme'),
		'two' => __('Two', 'created_theme'),
		'three' => __('Three', 'created_theme'),
		'four' => __('Four', 'created_theme'),
		'five' => __('Five', 'created_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'created_theme'),
		'two' => __('Pancake', 'created_theme'),
		'three' => __('Omelette', 'created_theme'),
		'four' => __('Crepe', 'created_theme'),
		'five' => __('Waffle', 'created_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/lib/admin/images/';

	$options = array();
	
$options[] = array(
	'name' => __('Settings', 'created_theme'),
	'type' => 'heading');
		
	$options[] = array(
		'name' => __('announcement text', 'created_theme'),
		'desc' => __('Check to add a small spot to place information above header', 'created_theme'),
		'id' => 'display_pre_header_text',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Pre Header announcement text', 'created_theme'),
		'desc' => __('', 'created_theme'),
		'id' => 'pre_header_text',
		'std' => 'ex. You ready to dance?',
		'class' => 'hidden',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Url for text', 'created_theme'),
		'desc' => __('', 'created_theme'),
		'id' => 'pre_header_url',
		'std' => 'http://google.com',
		'class' => 'hidden',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Site Logo', 'created_theme'),
		'desc' => __('Upload a logo to display in header', 'created_theme'),
		'id' => 'created_logo',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Hide site description', 'created_theme'),
		'desc' => __('Check to not display the sites description under logo', 'created_theme'),
		'id' => 'hide_subtitle',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => "Logo and navigation layout",
		'desc' => "Choose the way you want your logo and navigation to display in the header",
		'id' => "header_layout",
		'std' => "logo-above",
		'type' => "images",
		'options' => array(
			'logo-above' => $imagepath . 'layout-la.png',
			'logo-left' => $imagepath . 'layout-ll.png',
			'logo-center' => $imagepath . 'layout-lc.png')
	);
	
	$options[] = array(
		'name' => __('Google Analytics ID', 'created_theme'),
		'desc' => __('Enter the ID only (ex. UA-00000000-0).', 'created_theme'),
		'id' => 'google_id',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

$options[] = array(
	'name' => __('Info', 'created_theme'),
	'type' => 'heading');

	$options[] = array(
		'name' => __('Created - A theme to start awesome things', 'created_theme'),
		'desc' => __('This theme was created by <a href="http://jarederickson.com/" title="Jared Erickson">Jared Erickson</a>. Hope you enjoy! follow me on the twitter <a href="http://twitter.com/alliswell" title="twitter">@alliswell</a><br><br>View <a href="http://lessmade.com/created-theme" title="created theme">Created Theme</a> page for updates', 'created_theme'),
		'type' => 'info');

	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#display_pre_header_text').click(function() {
  		$('#section-pre_header_text').fadeToggle(400);
  		$('#section-pre_header_url').fadeToggle(400);
	});

	if ($('#display_pre_header_text:checked').val() !== undefined) {
		$('#section-pre_header_text').show();
		$('#section-pre_header_url').show();
	}

});
</script>

<?php
}