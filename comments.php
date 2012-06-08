<!-- Begin Comments -->
<div>
	<?php
	
		/* Smash some bots and make sure people can't see on password protected posts */
		
    $req = get_option('require_name_email'); // Checks if fields are required.
    if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
        die ( 'Do not laod this page directley' );
    if ( ! empty($post->post_password) ) :
        if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
	?>
                
    <div class="alert-box warning nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'Created') ?></div>
            
</div>

<?php
        return;
    endif;
endif;
?>
<!-- End Comments -->

<?php if ( have_comments() ) : ?>
 
<?php
	$ping_count = $comment_count = 0;
	foreach ( $comments as $comment )
    get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>
 
<?php if ( ! empty($comments_by_type['comment']) ) : ?>
 
<!-- Begin Comments List -->
<div id="comments-list" class="comments">
	<h4 class="subheader"><?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'Created') : __('<span>One</span> Comment', 'Created'), $comment_count) ?></h4>
           	 
	<ol id="ordered-comments">
		<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
	</ol>
	 
	<!-- Begin Navigation -->
	<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
		<div id="comments-nav-below" class="comments-navigation">
	    	<div class="comments-pagination">
	    		<?php paginate_comments_links(); ?>
	    	</div>
	    </div>
	<?php endif; ?>
	<!-- End Navigation (Below) -->
                
</div>
<!-- End Comments List -->

<?php endif; /* if ( $comment_count ) */ ?>

<?php // the comment form
	comment_form(); ?>
 
<?php /* If there are trackbacks(pings), show the trackbacks  */ ?>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>
 
	<div id="trackbacks-list" class="comments">
                    <h3><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'Created') : __('<span>One</span> Trackback', 'Created'), $ping_count) ?></h3>
 
<?php /* An ordered list of our custom trackbacks callback, custom_pings(), in functions.php   */ ?>
                    <ol>
<?php wp_list_comments('type=pings&callback=custom_pings'); ?>
                    </ol>             
 
                </div><!-- #trackbacks-list .comments -->           
 
<?php endif /* if ( $ping_count ) */ ?>
<?php endif /* if ( $comments ) */ ?>
 

</div><!-- #comments -->