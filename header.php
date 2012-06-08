<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	
	<!-- set viewport for mobile-->
	<meta name="viewport" content="width=device-width" />
	
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
	
	<!-- human txt || all the open source goodness that made this possible -->
	<link type="text/plain" rel="author" href="<?php echo get_stylesheet_directory_uri(); ?>/humans.txt" /> 
	
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	
	<!-- Where are all the css/js link/script files? they are where they are supposed to be.. in the functions.php file being enqued via WordPress best practices -->
  
	<?php wp_head(); ?>
	
	<?php if ( of_get_option('google_id') ) { ?>
	<script type="text/javascript">
					var _gaq = _gaq || [];
					_gaq.push(['_setAccount', '<?php echo of_get_option('google_id') ?>']);
					_gaq.push(['_trackPageview']);
		
					(function() {
						var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
						ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
					})();
	</script>
	<?php } //endif google id ?>


</head>

<body <?php body_class(); ?>>

	<!-- Begin Container -->
	<div class="container">
	
		<div id="pre-header">
			<div class="row">
				
				<div class="twelve columns">
					<div class="pre-header-inner padded">

					<?php if ( of_get_option('display_pre_header_text') ) { ?>
         		 <div class="pre-header-text"><a href="<?php echo of_get_option('pre_header_url'); ?>" title="<?php echo of_get_option('pre_header_text'); ?>"><?php echo of_get_option('pre_header_text'); ?></a></div>         
          <?php } //endif ?>
          
          	
						<?php 
						// display pre-header only if there is a menu
						if ( has_nav_menu( 'pre-header-menu' ) ) { ?>
          
				  	<?php wp_nav_menu( array( 'theme_location' => 'pre-header-menu','menu_class' => 'pre-nav', 'container' => 'nav', 'container_class' => 'clearfix', 'depth' => 1) ); ?>
				  	
				  	<?php } //end if menu ?>
				  	
					</div><!--/pre-header-inner -->
				</div><!--/ columns -->
				 
				</div><!-- /row -->
		</div><!--/#pre-header -->
			
		
		<header>
			<!-- Header Row -->
			<div class="row">
			
				<!-- Header Column -->
				<div class="twelve columns">
				
					<div id="inner-header" class="padded clearfix">
				
					<!-- Site Description & Title -->
					<hgroup id="logo" class="layout-<?php echo of_get_option('header_layout'); ?>">	
						
						<!-- display either image for logo, or text depending on option set -->
						<?php if ( of_get_option('created_logo') ) { ?>
           		
           		 <a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home" ><img src="<?php echo of_get_option('created_logo'); ?>" /></a>
           
            <?php } else { ?>
            
              <?php if( is_single() || is_page() ) { ?>
						   <h2 id="site-title">
						   	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						   </h2>
						   <?php } else {  ?>
						   	
						   	<h1 id="site-title">
						   		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						   	</h1>
						   	
						   <?php } //endelse ?>
						   
						<?php } //endif ?>					
						
						<?php if ( of_get_option('hide_subtitle') == 0 ) { ?>
						<h4 class="subheader"><?php bloginfo('description'); ?></h4>
						<?php } // endif hide subtitle ?>
					</hgroup>

					<!-- Main Navigation --> 
					<?php if ( has_nav_menu( 'header-menu' ) ) { ?>
						<div id="main-nav" class="layout-<?php echo of_get_option('header_layout'); ?>" role="navigation">				
	 				    <?php wp_nav_menu( array( 'theme_location' => 'header-menu','menu_class' => 'nav-bar clearfix', 'container' => 'nav', 'walker' => new Created_Nav_Menu_Walker()) ); ?>
						</div>
          <?php } //end if main nav ?>
         
           </div><!-- /inner-header -->
				</div><!-- Header Column -->
		</div><!-- Header Row -->		
	</header>		