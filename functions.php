<?php

// Include the custom navigation walker
include_once( get_template_directory() . '/lib/Created_Nav_Walker.class.php' );

// Add thumbnail support
add_theme_support( 'post-thumbnails' );

// custom background
add_theme_support( 'custom-background' );

// Post types Possible additions | aside | gallery | link | image | quote | status | video | audio | chat
add_theme_support( 'post-formats', array( 'image', 'link', 'video' ) );

// Add theme support for Automatic Feed Links
add_theme_support( 'automatic-feed-links' );

// Custom Navigation
add_theme_support('nav-menus');

/*-----------------------------------------------------------------------------------*/
/*	Include Dependencies
/*-----------------------------------------------------------------------------------*/

// Add shortcodes shortcodes TODO
//include_once( get_template_directory() . '/lib/shortcodes.php' );

/* 
	include options framework
	using https://github.com/devinsays/options-framework-theme
*/
if ( ! function_exists( 'optionsframework_init' ) ) {

	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/lib/admin/' );
	require_once dirname( __FILE__ ) . '/lib/admin/options-framework.php';
	
}

// Add Custom Meta Box scripts directly to the stylesheet directory so you can overide or add new ones in your child theme
include_once( get_template_directory() . '/lib/metabox/cmb.php' );

/** 
 * Hide editor for template-home.php
 */
function hide_editor() {

	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( ! isset( $post_id ) ) return;

	// Get the name of the page template file
	$template_file = get_post_meta( $post_id, '_wp_page_template', true );
    
    if( 'template-home.php' == $template_file ) {
    
    	remove_post_type_support('page', 'editor');
    	remove_post_type_support('page', 'thumbnail');
    	
    }
    
}
add_action( 'admin_init', 'hide_editor' );

// Add some new image sizes
if ( function_exists( 'add_image_size' ) ) { 

	add_image_size( 'slider', 1170, 500, true ); 		// Slider image size
	add_image_size( 'homepage-thumb', 220, 180, true ); // Cropped
	
} 

// ------------------- Imports all theme stylesheets

function created_add_style() {

	// Register google webfont
	// wp_register_style('googleWebfont', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,800italic,400,300,800');
	// wp_enqueue_style( 'googleWebfont');

	// ZURB foundation
	wp_register_style( 'Created', get_template_directory_uri() . '/css/foundation.css' );
	wp_enqueue_style( 'Created' ); 
	
	// ZURB glyph fonts
	wp_register_style( 'fonts', get_template_directory_uri() . '/css/fonts.css' );
	wp_enqueue_style( 'fonts' );
	
	// sniff out IE browsers and add a style sheet for them fools
	global $is_IE;
	if ( $is_IE ) {
	
		wp_register_style( 'foundation_ie', get_template_directory_uri() . '/css/ie.css' );
		wp_enqueue_style( 'foundation_ie' ); 
		
	} // end if ie
		
	// Theme stylesheet
	wp_register_style( 'created', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'created' );
	
} // end add_style
add_action( 'wp_print_styles', 'created_add_style' );

// ----------------- Imports JavaScipts

// nested comment reply script
function comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'comments_reply' );

function created_add_scripts() {

	// ZURB modernizer
	wp_register_script( 'modernizer', get_template_directory_uri() . '/js/modernizr.foundation.js', array( 'jquery' ) );
	wp_enqueue_script( 'modernizer' );
	
	// ZURB foundation
	wp_register_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.js', array( 'jquery' ) );
	wp_enqueue_script( 'foundation_js' );
	
	// responsiveSlides.js 
	wp_register_script( 'responsive_slides', get_template_directory_uri() . '/js/responsiveslides.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'responsive_slides' );
	
	// custom
	wp_register_script( 'custom_js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'custom_js' );

} // end add_theme_scripts
add_action( 'wp_enqueue_scripts', 'created_add_scripts' );

// add ie conditional html5 shim to header
function add_ie_html5_shim () {
    
    $html =  '<!--[if lt IE 9]>';
    $html .= 	'<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    $html .= '<![endif]-->';
    
    echo $html_shim;
}
add_action('wp_head', 'add_ie_html5_shim');

/* ------------------------------------- slider */

// Slider using responsiveslider http://responsiveslides.com v1.32 by @viljamis
function Slider() {

	$Slider_args = array(
		'label'				=> 	__( 'Slider' ),
		'singular_label' 	=>	__( 'Slide' ),
		'public'			=>	true,
		'show_ui'			=>	true,
		'capability_type'	=>	'post',
		'hierarchical'		=>	false,
		'rewrite'			=>	true,
		'menu_icon' 		=> 	get_template_directory_uri() . '/images/misc/icn-slider.png',
		'supports'			=>	array( 'title', 'editor', 'page-attributes', 'custom-fields', 'thumbnail' )
	);
	
	register_post_type( 'Slider', $Slider_args );
	
} 
add_action( 'init', 'Slider' );

function created_slider(){

	$args = array( 'post_type' => 'Slider');
	$loop = new WP_Query( $args );
	
		echo '<div class="created-slider">';
			
			echo '<ul class="rslides">';
		
				while ( $loop->have_posts() ) : $loop->the_post();	
				
					global $post; 
						
							echo '<li class="slider-content">';
							
							// the sliders image
							
								echo '<div class="slider-img clearfix">';
							
								 if ( has_post_thumbnail() ) { ?>
							
									<?php if(( get_post_meta($post->ID, "cr_slider_link", true))) { ?>
											<a class="slider-link" href="<?php echo get_post_meta($post->ID, "cr_slider_link", true); ?>" title="<?php the_title(); ?>">
												<?php the_post_thumbnail('slider'); ?>
											</a>
									<?php } else {
											the_post_thumbnail('slider');
										} // end else ?>
							<?php } else {
							
								echo '<div class="slider-no-image"></div>';
								
							} // end else no image for slider
							
								echo '</div>'; // slider-img
							
													 					 
								echo '<div class="caption">';
								
								// show captions	
								if(( get_post_meta($post->ID, "cr_slider_show_caption", true))) {
								
									echo '<h2>';
											the_title();
									echo '</h2>';
									
									echo '<div class="hide-on-phones">';
										the_content();
									echo '</div>';
								} // end caption
								
								echo '</div>'; // end caption	
							echo '</li>';	
				
				endwhile;
		
		echo '</ul>';
		
	echo '</div>'; // close created-slider
		
} // end created_slider

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  // - Header Navigation
		  'pre-header-menu' => 'Pre Header menu',
		  'header-menu' => 'Header Navigation',
		)
	);
}

// Sidebars
if (function_exists('register_sidebar')) {

	// Right Sidebar
	register_sidebar(
		array(
			'name'			=> 'Right Sidebar',
			'id' 			=> 'right_sidebar',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</li>',
			'before_title' 	=> '<h4>',
			'after_title'	 => '</h4>',
		)
	);
	
	// Footer Sidebar
	register_sidebar(
		array(
			'name'			=> 'Footer Sidebar',
			'id' 			=> 'footer_sidebar',
			'before_widget' => '<div id="%1$s" class="widget four columns %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4>',
			'after_title'	 => '</h4>',
		)
	);
}

// Comments

// Custom callback to list comments in the Foundation style
function custom_comments($comment, $args, $depth) {
  	$GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
  ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
        <div class="comment-author vcard"><?php commenter_link() ?></div>
        <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">#</a>', 'Created'),
                    get_comment_date(),
                    get_comment_time(),
                    '#comment-' . get_comment_ID() );
                    edit_comment_link(__('Edit', 'Created'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'Created') ?>
          <div class="comment-content">
          
            <?php comment_text() ?>
            
			<div class="reply">
				<?php 
					comment_reply_link( 
						array_merge( 
							$args, 
							array(
								'depth' 		=> $depth, 
								'reply_text' 	=> __( 'Reply', 'Created'),
								'before' 		=> '<div class="comment-reply-link">',
								'after' 		=> '</div>'
							) 
						) 
					); ?>
			</div><!-//reply -->

		</div><!--/comment-content -->
        
<?php } // end custom_comments

// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
            <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'Created'),
                        get_comment_author_link(),
                        get_comment_date(),
                        get_comment_time() );
                        edit_comment_link(__('Edit', 'Created'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'Created') ?>
            <div class="comment-content">
                <?php comment_text() ?>
            </div>
<?php } // end custom_pings

// Produces an avatar image with the hCard-compliant photo class
function commenter_link() {
	    if ($comment->comment_approved == '0'); {
		    $commenter = get_comment_author_link();
		    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
		        $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
		    } else {
		        $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
		    }
		    $avatar_email = get_comment_author_email();
		    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 35 ) );
		    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
	    } //endif
} // end commenter_link


// Custom Pagination
/**
 * Retrieve or display pagination code.
 *
 * The defaults for overwriting are:
 * 'page' - Default is null (int). The current page. This function will
 *      automatically determine the value.
 * 'pages' - Default is null (int). The total number of pages. This function will
 *      automatically determine the value.
 * 'range' - Default is 3 (int). The number of page links to show before and after
 *      the current page.
 * 'gap' - Default is 3 (int). The minimum number of pages before a gap is 
 *      replaced with ellipses (...).
 * 'anchor' - Default is 1 (int). The number of links to always show at begining
 *      and end of pagination
 * 'before' - Default is '<div class="emm-paginate">' (string). The html or text 
 *      to add before the pagination links.
 * 'after' - Default is '</div>' (string). The html or text to add after the
 *      pagination links.
 * 'next_page' - Default is '__('&raquo;')' (string). The text to use for the 
 *      next page link.
 * 'previous_page' - Default is '__('&laquo')' (string). The text to use for the 
 *      previous page link.
 * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
 *      to 0 (zero).
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param array|string $args Optional. Override default arguments.
 * @return string HTML content, if not displaying.
 */
function emm_paginate( $args = null ) {

	$defaults = array(
		'page' => null, 'pages' => null, 
		'range' => 3, 'gap' => 3, 'anchor' => 1,
		'before' => '<ul class="pagination">', 'after' => '</ul>',
		'title' => __('<li class="unavailable"></li>'),
		'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
		'echo' => 1
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	if ( ! $page && ! $pages ) {
		global $wp_query;

		$page = get_query_var( 'paged' );
		$page = ! empty( $page ) ? intval( $page ) : 1;

		$posts_per_page = intval( get_query_var( 'posts_per_page' ) );
		$pages = intval( ceil( $wp_query->found_posts / $posts_per_page ) );
	}
	
	$output = "";
	if ( $pages > 1 ) {	
		$output .= "$before<li>$title</li>";
		$ellipsis = "<li class='unavailable'>...</li>";

		if ( $page > 1 &&  ! empty( $previouspage ) ) {
			$output .= "<li><a href='" . get_pagenum_link( $page - 1 ) . "'>$previouspage</a></li>";
		}
		
		$min_links = $range * 2 + 1;
		$block_min = min( $page - $range, $pages - $min_links );
		$block_high = max( $page + $range, $min_links );
		$left_gap = ( ( $block_min - $anchor - $gap ) > 0 ) ? true : false;
		$right_gap = ( ( $block_high + $anchor + $gap ) < $pages ) ? true : false;

		if ( $left_gap && ! $right_gap ) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $pages, $page)
			);
		}
		else if ( $left_gap && $right_gap ) {
			$output .= sprintf('%s%s%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $block_high, $page), 
				$ellipsis, 
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else if ( $right_gap && !$left_gap ) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else {
			$output .= emm_paginate_loop(1, $pages, $page);
		}

		if ( $page < $pages && ! empty( $nextpage ) ) {
			$output .= "<li><a href='" . get_pagenum_link($page + 1) . "'>$nextpage</a></li>";
		}

		$output .= $after;
	}

	if ( $echo ) {
		echo $output;
	}

	return $output;
}

/**
 * Helper function for pagination which builds the page links.
 *
 * @access private
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param int $start The first link page.
 * @param int $max The last link page.
 * @return int $page Optional, default is 0. The current page.
 */
function emm_paginate_loop( $start, $max, $page = 0 ) {

	$output = "";
	
	for ( $i = $start; $i <= $max; $i++ ) {
		$output .= ( $page === intval( $i ) ) 
			? "<li class='current'><a href='#'>$i</a></li>" 
			: "<li><a href='" . get_pagenum_link($i) . "'>$i</a></li>";
	}
	
	return $output;
	
} 

?>