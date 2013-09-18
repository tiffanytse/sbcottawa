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
	  <div class="col left">
	    <address>
	      <strong>Saint Brigid’s Centre for the Arts</strong><br>
        613 244 7373<br>
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
	  <div class="col right">
	    <strong>Connect </strong>
	    <ul>
        <li><a href="https://www.facebook.com/sbcottawa"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png"></a></li>
        <li><a href="http://vimeo.com/user15133040"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/vimeo.png"></a></li>
	    </ul>
	  </div>
	  
		<div class="site-info">
		  <p>Copyright 2013 &copy; Saint Brigid's Centre for the Arts</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>