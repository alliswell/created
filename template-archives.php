<?php 
/*
Template Name: Archives
*/

get_header();

?>

<!-- TODO - sorry did not get around to styling this yet -->

<div id="main-wrapper" class="padded">

	<div class="row">

<!-- archives -->

		<div class="eight columns">
		
		<!-- Skip Nav -->
		<a id="content"></a>
		
			<?php the_post(); ?>
			<h2 class="post-title"><?php the_title(); ?></h2>
						
			<h4 class="subheader">Archives by Month:</h4>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
				
			<h4 class="subheader">Archives by Subject:</h4>
			<ul>
				 <?php wp_list_categories(); ?>
			</ul>
		
		</div>

<?php get_sidebar(); ?>

	</div><!-- /row -->
</div><!-- /main-wrapper -->

<?php get_footer(); ?>

<!-- archives -->