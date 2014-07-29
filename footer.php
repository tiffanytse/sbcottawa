<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="left-cols">
		  <div class="col left">
		    <address>
		      <strong>Saint Brigid’s Centre for the Arts</strong><br>
	        <a href="tel:613 244 7373">613 244 7373</a><br>
	        310 St. Patrick Street<br>
	        Ottawa ON K1N 5K4
		    </address>
		  </div>
		  <div class="col left">
		    <address>
		      <strong>Mailing and Office</strong><br>
	        179 Murray Street<br>
	        Ottawa ON K1N 5M7
		    </address>
		  </div>
		</div>
	  <div class="right-cols">
			<div class="col right connect">	    
				<strong>Connect </strong>
				<!-- Connect Navigation -->
				    <?php wp_nav_menu( array( 'theme_location' => 'connect', 'menu_class' => 'connect-menu', 'fallback_cb' => false ) ); ?>
				<!-- #connect-navigation -->
			</div>

			<div class="col right">
				<strong>Organizations</strong>
				<!-- Organizations Navigation -->
				    <?php wp_nav_menu( array( 'theme_location' => 'organizations', 'menu_class' => 'organizations-menu', 'fallback_cb' => false ) ); ?>
				<!-- #organizations-navigation -->
			</div>

			<div class="col right">
				<strong>Saint Brigid's Centre for the Arts</strong>
				<!-- Page Navigation -->
				    <?php wp_nav_menu( array( 'theme_location' => 'pages', 'menu_class' => 'pages-menu', 'fallback_cb' => false ) ); ?>
				<!-- #page-navigation -->
			</div>
		</div>

		<div class="site-info">
		  <p>Copyright <?php print date(Y); ?> &copy; Saint Brigid's Centre for the Arts</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>