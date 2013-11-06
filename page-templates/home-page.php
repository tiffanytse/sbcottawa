<?php
/**
 * Template Name: Home Page Template
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

       <div class="event-listing">
          <?php
           $events = eo_get_events(array(
                   'numberposts'=>5,
                   'event_start_after'=>'today',
                   'showpastevents'=>true,//Will be deprecated, but set it to true to play it safe.
                   'event-category'=>'home-slider',

              ));

            if($events):
               echo '<div class="flex-container">
                      <div class="flexslider">
                        <ul class="slides">';
               foreach ($events as $event):
                    
                    //Check if all day, set format accordingly
                    $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' \&\n\b\s\p; | \&\n\b\s\p;'.get_option('time_format') );
                    printf(
                       '
                             <li>
                               %s
                               <div class="flex-caption">
                                <a href="%s"><h3> %s </h3> </a><br>
                                <p class="date">%s</p><br>
                                <a href="%s" class="ed-link">Event Details &nbsp; › </a>
                               </div>
                             </li>
                        ',
                       get_the_post_thumbnail($event->ID, 'large'),
                       get_permalink($event->ID),
                       get_the_title($event->ID),
                       eo_get_the_start($format, $event->ID,null,$event->occurrence_id),
                       get_permalink($event->ID)
                       

                       //eo_get_the_start('F jS Y'. '<\p \c\l\a\s\s \=\"\t\"/>' .'g:i a' . '<\p/>', $event->ID,null,$event->occurrence_id)
                    );
               endforeach;
               echo '</ul></div></div>';
            endif;
           ?>        
        </div><!-- event listing -->
        <div class="placeholder"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder.png" alt=""></div>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider-min.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.fitvids.js" type="text/javascript"></script>
  <script type="text/javascript" charset="utf-8">
  jQuery(function ($) {

    $(window).load(function() {
      $('.flexslider').flexslider({
            animation: "slide",
            controlsContainer: ".flex-container", 
            smoothHeight: 'true'   
      });
    });
  });
  </script>
<?php get_footer(); ?>