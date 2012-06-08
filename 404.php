<?php get_header(); ?>

<div id="main-wrapper" class="padded">
	<div class="row">
	
	<div class="twelve columns centered">
	<div class="alert-box error">404!</div>
	<h1>DOH! 404</h1>  
	<p>Look's like what you where looking for is not showing up...</p>
	<p>Give Search a try</p>
	
	<?php get_search_form(); ?>
	
	<a href="<?php echo home_url( '/' ); ?>">&larr; Go Home?</a>
	
	</div><!-- /row -->
	
</div><!-- main-wrapper -->

<?php get_footer(); ?>