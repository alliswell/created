<?php 
/**
 * Template Name: Full Width
 */
?>

<?php get_header(); ?>

<div id="main-wrapper" class="padded">
	
	<div class="row">
	
		<div class="twelve columns">
		
			<!-- Start the Loop -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<article>
						
					<!-- It's the title of the page -->
					<h2><?php the_title(); ?></h2>
					
					<!--main content for page -->
					<div class="entry">
						<?php the_content(); ?>
					</div>
					
					<!-- Display a comma separated list of the Post's Categories. -->
					<p class="postmetadata">Posted in <?php the_category(', '); ?></p>
				
				</article>
				<!-- Closes the first article -->
				
				<!-- Begin Comments -->
			    <?php comments_template( '', true ); ?>
			    <!-- End Comments -->
			
			<!-- Stop The Loop (but note the "else:" - see next line). -->
			<?php endwhile; else: ?>
			
				<!-- The very first "if" tested to see if there were any Posts to -->
				<!-- display.  This "else" part tells what do if there weren't any. -->
				<div class="alert-box error">Sorry, no posts matched your criteria.</div>
			
			<!--End the loop -->
			<?php endif; ?>
			
		</div> <!-- /.twelve columns -->
	
	</div><!--/.row -->
	
</div><!--/ main-wrapper -->


<?php get_footer(); ?>