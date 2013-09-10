<?php
/**
 * Template Name: The Rectory Blog Page Template
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
        <h1>Upcoming Events for The Rectory Art House</h1>
        <br>
        <?php
         $events = eo_get_events(array(
                 'numberposts'=>5,
                 'event_start_after'=>'today',
                 'showpastevents'=>true,//Will be deprecated, but set it to true to play it safe.
                 'event-category'=>'rectory-event',
            ));

          if($events):
             echo '<ul id="ticker">';
             foreach ($events as $event):
                  //Check if all day, set format accordingly
                  $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );
                  printf(
                     '<li>
                     %s<h2><a href="%s"> %s </a></h2> on %s 
                     </li>',
                     get_the_post_thumbnail($event->ID, 'thumbnail'),
                     get_permalink($event->ID),
                     get_the_title($event->ID),
                     eo_get_the_start($format, $event->ID,null,$event->occurrence_id)
                  );
             endforeach;
             echo '</ul>';
            else:
               echo '<p>No upcoming events.</p>';
             endif;
            ?>       
      </div><!-- event listing -->
      <hr>
          
      <?php while ( have_posts() ) : the_post(); ?>
      <div class="page-content">
        <?php get_template_part( 'content', 'page' ); ?>
      <?php endwhile; // end of the loop. ?>
      </div>
      <div class="niccc-items post-content">
        <?php query_posts( 'category_name=rectory' );

          if ( have_posts() ) while ( have_posts() ) : the_post();
          //get_post_content shows the next and previous posts
          get_template_part('content', get_post_format() ); 

          endwhile; 

          wp_reset_query(); ?>
      </div><!-- .post-content -->

    </div><!-- #content -->
  </div><!-- #primary -->
<?php get_sidebar(); ?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.fitvids.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
jQuery(function ($) {

  $(window).load(function() {
    
    
    function tick(){
   		$('#ticker li:first').slideUp( function () { $(this).appendTo($('#ticker')).slideDown(); });
   	}
   	setInterval(function(){ tick () }, 5000);
  });

});
</script>
<?php get_footer(); ?>