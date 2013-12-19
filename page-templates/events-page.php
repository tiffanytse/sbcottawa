<?php
/**
 * Template Name: Events Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		  <header class="entry-header">
  			<h1 class="entry-title"><?php the_title(); ?></h1>
  		</header><!-- .entry-header -->
  		
      <?php
       $events = eo_get_events(array(
            'numberposts'=>10,
            'event_start_after'=>'today',
            'showpastevents'=>true,//Will be deprecated, but set it to true to play it safe.
         ));


       if( $events ){
           global $post;
           foreach( $events as $post ){
                setup_postdata($post);
                ?>
                <?php 
                echo '<article class="event-item">';
                
          			 the_post_thumbnail('thumbnail'); ?>
          			  <div class="event-info">
            			<header class="eventslist-header entry-header">
                    <a href='<?php the_permalink() ?>'> <h1 class="entry-title"><?php the_title(); ?></h1></a>
                  </header>
                  <?php eo_the_start('F jS Y <\s\p\a\n \c\l\a\s\s="\t-\i">g:ia</\s\p\a\n>'); ?>
                  
                  
                		<?php if( eo_reoccurs() ):?>
                			<!-- Event reoccurs - is there a next occurrence? -->
                			<?php $next =   eo_get_next_occurrence($date_format);?>

                			<?php if($next): ?>
                				<!-- If the event is occurring again in the future, display the date -->
                				<?php printf('<p>'.__('This event is running from %1$s until %2$s. It is next occurring on %3$s','eventorganiser').'.</p>', eo_get_schedule_start('j F Y'), eo_get_schedule_last('j F Y'), $next);?>

                			<?php else: ?>
                				<!-- Otherwise the event has finished (no more occurrences) -->
                				<?php printf('<p>'.__('This event finished on %s','eventorganiser').'.</p>', eo_get_schedule_last('d F Y',''));?>
                			<?php endif; ?>
                		<?php endif; ?>

                	<ul class="eo-event-meta" >


                		<?php if( eo_get_venue() ){ ?>
                			<li><strong><?php _e('Venue','eventorganiser'); ?>:</strong> <a href="<?php eo_venue_link(); ?>"> <?php eo_venue_name(); ?></a></li>
                		<?php } ?>


                		<?php if( get_the_terms(get_the_ID(),'event-category') ){ ?>
                			<li><strong><?php _e('Categories','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></li>
                		<?php } ?>


                		<?php if( get_the_terms(get_the_ID(),'event-tag') && !is_wp_error( get_the_terms(get_the_ID(),'event-tag') ) ){ ?>
                			<li><strong><?php _e('Tags','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-tag', '', ', ', '' ); ?></li>
                		<?php } ?>

                		<?php if( eo_reoccurs() ){ 			
                				//Event reoccurs - display dates. 
                				$upcoming = new WP_Query(array(
                					'post_type'=>'event',
                					'event_start_after' => 'today',
                					'posts_per_page' => -1,
                					'event_series' => get_the_ID(),
                					'group_events_by'=>'occurrence'//Don't group by series
                				));

                				if( $upcoming->have_posts() ): ?>

                					<li><strong><?php _e('Upcoming Dates','eventorganiser'); ?>:</strong>
                						<ul id="eo-upcoming-dates">
                							<?php while( $upcoming->have_posts() ): $upcoming->the_post(); ?>
                									<li> <?php eo_the_start($date_format) ?></li>
                							<?php endwhile; ?>
                						</ul>
                					</li>

                					<?php 
                					wp_reset_postdata(); 
                					//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
                					wp_enqueue_script('eo_front');
                					?>
                				<?php endif; ?>
                		<?php } ?>

                	</ul>
                  <p><?php the_excerpt(); ?></p>
                  </div> <!-- Event Info Close-->
                  <?php

                  echo '</article>'; 

            }
           wp_reset_postdata();
       }else{
           echo 'No Upcoming Events';
       }
       ?>
       

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'event-sidebar' ); ?>
<?php get_footer(); ?>