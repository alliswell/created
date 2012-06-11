<?php 
/** 
 * Template Name: Home w/ slider
 */
?>

<?php get_header(); ?>

<div class="slider-wrapper padded">
	<div class="row">
		<div class="twelve columns">
			<?php created_slider(); ?>
		</div>
	</div><!-- /row -->
	
</div><!--/.slider-wrapper -->

	<!-- Start the Loop -->	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<!-- Welcome text box wrapper. -->
<?php if(( get_post_meta($post->ID, "cr_home_show_welcome", true) == 'on' )) { ?>
<div id="welcome-wrapper">

	<div class="row">
	
		<div class="twelve columns">
		
			<!-- Welcome text container -->
			<div id="home-hello" class="padded">
			
				<h3><?php echo get_post_meta($post->ID, "cr_home_hello", true); ?></h3>
				
			</div><!- /#home-welcome -->
			
		</div><!- /.twelve columns -->
	
	</div> <!-- /.row -->
	
</div><!--/#welcome-wrapper -->
<?php } //end if hello text ?>

<!-- Bucket Wrapper. -->
<?php if(( get_post_meta($post->ID, "cr_home_show_buckets", true) == 'on' )) { ?>

<div id="bucket-wrapper">
	<div class="buckets padded">
	
		<div class="row">
		
		 <!-- bucket 1 start -->
			<div class="four columns">
				<div class="bucket1">
				
					<?php if(( get_post_meta($post->ID, "cr_home_bucket1_img", true))) { ?>
						<!-- display bucket 1 image -->
						<div class="bucket-img">
						
							<?php if(( get_post_meta($post->ID, "cr_home_bucket1_img_link", true))) { ?>
								
								<a href="<?php echo get_post_meta($post->ID, "cr_home_bucket1_img_link", true); ?>" title=""><img src="<?php echo get_post_meta($post->ID, "cr_home_bucket1_img", true); ?>" alt="<?php echo get_post_meta($post->ID, "cr_home_bucket1_title", true); ?>" /></a>
							<?php } else { ?>
							
								<img src="<?php echo get_post_meta($post->ID, "cr_home_bucket1_img", true); ?>" alt="<?php echo get_post_meta($post->ID, "cr_home_bucket1_title", true); ?>" />
							
						<?php } //endelse  ?>
						</div><!-- /bucket-img -->
				
					<?php } //endif bucket 1 image ?>
				
					<?php if(( get_post_meta($post->ID, "cr_home_bucket1_title", true))) { ?>
						<!-- display bucket 1 title -->
						<h3><?php echo get_post_meta($post->ID, "cr_home_bucket1_title", true); ?></h3>
					<?php } // endif bucket 1 title ?>
					

					<?php if(( get_post_meta($post->ID, "cr_home_bucket1_text", true))) { ?>
						<!-- display bucket 1 text -->
						<p><?php echo get_post_meta($post->ID, "cr_home_bucket1_text", true); ?></p>
						
					<?php } //endif bucket 1 text ?>
					
				</div><!--/.bucket1 -->
			</div><!-- /four -->
			
		<!-- bucket 2 start -->
			<div class="four columns">
				<div class="bucket2">
				
					<?php if(( get_post_meta($post->ID, "cr_home_bucket2_img", true))) { ?>
						<!-- display bucket 2 image -->
						<div class="bucket-img">
							
							<?php if(( get_post_meta($post->ID, "cr_home_bucket2_img_link", true))) { ?>
								
								<a href="<?php echo get_post_meta($post->ID, "cr_home_bucket2_img_link", true); ?>" title=""><img src="<?php echo get_post_meta($post->ID, "cr_home_bucket2_img", true); ?>" alt="<?php echo get_post_meta($post->ID, "cr_home_bucket2_title", true); ?>" /></a>
							<?php } else { ?>
							
								<img src="<?php echo get_post_meta($post->ID, "cr_home_bucket2_img", true); ?>" alt="<?php echo get_post_meta($post->ID, "cr_home_bucket2_title", true); ?>" />
							
							<?php } //endelse  ?>
						</div><!-- /bucket-img -->
				
					<?php } //endif bucket 2 image ?>
				
					<?php if(( get_post_meta($post->ID, "cr_home_bucket2_title", true))) { ?>
						<!-- display bucket 2 title -->
						<h3><?php echo get_post_meta($post->ID, "cr_home_bucket2_title", true); ?></h3>
					<?php } // endif bucket 2 title ?>
					

					<?php if(( get_post_meta($post->ID, "cr_home_bucket2_text", true))) { ?>
						<!-- display bucket 2 text -->
						<p><?php echo get_post_meta($post->ID, "cr_home_bucket2_text", true); ?></p>
						
					<?php } //endif bucket 2 text ?>
					
					</div><!--/.bucket2 -->
			</div><!--/.four -->
			<!-- bucket 3 start -->
			
			<div class="four columns">
				<div class="bucket3">
				
					<?php if(( get_post_meta($post->ID, "cr_home_bucket3_img", true))) { ?>
						<!-- display bucket 3 image -->
						<div class="bucket-img">

							<?php if(( get_post_meta($post->ID, "cr_home_bucket3_img_link", true))) { ?>
								
								<a href="<?php echo get_post_meta($post->ID, "cr_home_bucket3_img_link", true); ?>" title=""><img src="<?php echo get_post_meta($post->ID, "cr_home_bucket3_img", true); ?>" alt="<?php echo get_post_meta($post->ID, "cr_home_bucket3_title", true); ?>" /></a>
								
							<?php } else { ?>
							
								<img src="<?php echo get_post_meta($post->ID, "cr_home_bucket3_img", true); ?>" alt="<?php echo get_post_meta($post->ID, "cr_home_bucket3_title", true); ?>" />
							
								<?php } //endelse  ?>
						</div><!-- /bucket-img -->	
									
					<?php } //endif bucket 3 image ?>
				
					<?php if(( get_post_meta($post->ID, "cr_home_bucket3_title", true))) { ?>
						<!-- display bucket 3 title -->
						<h3><?php echo get_post_meta($post->ID, "cr_home_bucket3_title", true); ?></h3>
					<?php } // endif bucket 3 title ?>
					

					<?php if(( get_post_meta($post->ID, "cr_home_bucket3_text", true))) { ?>
						<!-- display bucket 3 text -->
						<p><?php echo get_post_meta($post->ID, "cr_home_bucket3_text", true); ?></p>
						
					<?php } //endif bucket 3 text ?>
					
				</div><!--/.bucket3 -->
			</div><!-- /four -->
						
		</div><!-- /row -->
	</div><!-- /home-buckets -->
</div><!--  /bucket-wrapper -->

<?php } //endif buckets on ?>


<!-- Call to Action Wrapper. -->
<?php if(( get_post_meta($post->ID, "cr_home_show_ctab", true) == 'on' )) { ?>

<div class="row">
	<div class="ten columns centered">
	
		<div id="home-ctab" class="ctab-box">
		
				<div class="row">
					<div class="eight columns">
						<h4><?php echo get_post_meta($post->ID, "cr_home_ctab_title", true); ?></h4>
						<span><?php echo get_post_meta($post->ID, "cr_home_ctab_text", true); ?></span>
					</div>
					
					<div class="four columns">
					
						<?php if(( get_post_meta($post->ID, "cr_home_ctab_url", true))) { ?>
						
							<!-- if there is text for the button display it, else fall back to "click here" -->
							<?php if((get_post_meta($post->ID, "cr_home_ctab_url_text", true))) {
								$link_txt = get_post_meta($post->ID, "cr_home_ctab_url_text", true);
							} else {
								$link_txt = 'Click Here';
							} ?>
						
							<a class="large button green" href="<?php echo get_post_meta($post->ID, "cr_home_ctab_url", true); ?>"><?php echo $link_txt; ?></a>
						<?php } //end if ?>
						
					</div> <!-- /four columns -->
				</div> <!-- /row -->
				
		</div><!- /#home-info -->
		
	</div><!- /twelve columns -->
</div><!-- /.row -->


<?php } //info box ?>

		<!-- Stop The Loop (but note the "else:" - see next line). -->
		<?php endwhile; else: ?>

			<p>Sorry, no posts matched your criteria.</p>
		
		<!--End the loop -->
		<?php endif; ?>


<?php get_footer(); ?>