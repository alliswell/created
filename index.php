<?php get_header(); ?>

<div id="main-wrapper" class="padded">

	<div class="row">
	
		<div class="eight columns">
		
			<div id="main">	
			
			<!-- Start the Loop -->	
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<!-- Grab the loop article depending on post format -->
				<?php get_template_part( 'loop', get_post_format() ); ?>
			
			<!-- Stop The Loop (but note the "else:" - see next line). -->
			<?php endwhile; else: ?>
			
				<!-- The very first "if" tested to see if there were any Posts to -->
				<!-- display.  This "else" part tells what do if there weren't any. -->
				<p>Sorry, no posts matched your criteria.</p>
			
			<!--End the loop -->
			<?php endif; ?>
			
			<!-- Pagination -->
			<div id="pagination">
				<?php if (function_exists("emm_paginate")) {
				  emm_paginate();
				 } ?>	
			</div><!-- /Pagination -->
		
			</div><!-- /main -->
		
		</div><!--/eight columns -->
	
		<?php get_sidebar(); ?>
	
	</div> <!--/.row -->
</div><!--/main-wrapper -->
		
<?php get_footer(); ?>