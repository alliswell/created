<?php get_header(); ?>

<div id="main-wrapper" class="padded">

	<div class="row">
		<div class="main">
			<div class="eight columns">
		
			<!-- Start the Loop -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<!-- Grab the loop article depending on post format -->
				<?php get_template_part( 'loop', get_post_format() ); ?>
				
				<!-- Begin Comments -->
			    <?php comments_template( '', true ); ?>
			    <!-- End Comments -->
			
			<!-- Stop The Loop  -->
			<?php endwhile; else: ?>
			
				<div class="alert-box error">"oh snap! nothing here. try heading back home.</div>
			
			<!--End the loop -->
			<?php endif; ?>
			
			</div><!-- /eight columns -->
	 </div><!-- /main -->
	
	<?php get_sidebar(); ?>
	
	</div><!--/.row -->
</div><!--/main-wrapper -->
		
<?php get_footer(); ?>