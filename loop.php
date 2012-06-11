<!-- Basic loop-->
<article id="post-<?php the_ID() ?>" <?php post_class(); ?>>

	<div class="pre-title-meta">
		<span class="the-date"><?php the_time('F jS, Y') ?></span>
	</div> <!-- /pre-title-meta -->
	
	<!-- check if we are on a single page or not, to display correct markup for title -->	
	<?php if( is_single() || is_page() ) { ?>
	
		<h1 class="post-title">
			<?php the_title(); ?>
		</h1>
	
	<?php } else { ?>
	
		<h2 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
		
	<?php } //end else ?>

		
	<!-- The post content -->
	<div class="entry clearfix">
		<?php 
		
			// display post thumbnail if there is one
			if(has_post_thumbnail()) { ?>
			
				<figure class="post-thumbnail alignleft">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</figure> <!--/post-thumbnail -->
				
			<?php } // endif ?>
			
			<?php 
			// if the loop is on archive, category, or home and it has an exceprt it will display the excerpt
			if( ( is_archive() || is_category() || is_home() ) && has_excerpt() ) { ?>
			
				<?php the_excerpt( ); ?>
				
			<?php } else { ?>
			
				<?php the_content(); ?>
				
			<?php } //end else ?>
			
			<?php 
			// if the post has multiple pages 
			wp_link_pages( array( 'before' 	=> '<div class="paged-post"><span>' . Pages . '</span>', 'after' => '</div>' ) ); 
			?>
			
	</div>
	
	<div class="post-meta">
		<!-- The author of the post -->
		<span class="the-author"><?php the_author_posts_link() ?></span> &ndash;
		
		<!-- Display a comma separated list of the Post's Categories. -->
		<span class="the-category">Posted in <?php the_category(', '); ?></span>
		
		<!-- Show off em tags -->
		<span class="post-tags"><?php the_tags('&ndash; Tagged: ', ', '); ?></span> &ndash;
		
		<!-- Display the comment count -->
		<span class="comment-count"><?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></span>
		
		<?php if(is_home() ) { edit_post_link(' &ndash; edit '); } ?>
	</div><!-- /post-meta -->
	
</article>