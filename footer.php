<footer>
	<div id="footer-widgets" class="padded">
		<div class="row">	
		
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar')) : ?>
					<!-- displays three widgets in a grid -->
				<?php endif; ?>
			
		</div><!-- /row-->
	</div><!-- /footer-widgets -->
	
	<div id="sub-floor">
		<div class="row">
		
			<div class="twelve columns">
			
				<div id="credit" class="padded">
					<p>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> - Proudly powered by <a href="http://wordpress.org" title="WordPress" target="_blank">WordPress</a> and <a href="http://lessmade.com/created-theme" title="Created Theme" target="_blank">Created theme</a></p>
				</div><!-- /#credit -->
			
			</div><!-/ columns -->
			
		</div><!--/row -->
	</div><!-- /sub-floor -->
</footer><!-- Footer -->

	</div>
	<!-- container -->

	<?php wp_footer(); ?>
	
</body>
</html>