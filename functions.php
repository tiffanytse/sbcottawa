<?php
 
// de-queue navigation js
add_action('wp_print_scripts','tto_dequeue_navigation');
    function tto_dequeue_navigation() {
        wp_dequeue_script( 'twentytwelve-navigation' );
}
// load the new navigation js
    function tto_custom_scripts()
{
 
// Register the new navigation script
    wp_register_script( 'lowernav-script', get_stylesheet_directory_uri() . '/js/navigation.js', array(), '1.0', true );
 
// Enqueue the new navigation script 
    wp_enqueue_script( 'lowernav-script' );
}
add_action( 'wp_enqueue_scripts', 'tto_custom_scripts' );
 
// Add the new menu
register_nav_menus( array(
    'primary' => __( 'Top Menu (Above Header)', 'tto' ),
    'secondary' => __( 'Secondary Menu (Header)', 'tto'),
    'pages' => __( 'Footer Saint Brigids Menu', 'tto'),
    'organizations' => __( 'Footer Organizations Menu', 'tto'),
    'connect' => __( 'Footer Connect Menu', 'tto'),
) );


function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author_firstname() ) ),
		get_the_author_firstname()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( '<div class="meta-info"><div class="left"><span class="by-author"> By %4$s</span>  &middot;  %3$s </div><span class="tags"> %2$s </span></div>', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( '<div class="meta-info"><span class="by-author"> By %4$s</span> &middot; %3$s</div>', 'twentytwelve' );
	} else {
		$utility_text = __( '<span class="by-author"> By %4$s</span>', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

/* Remove Google Open Sans */

function mytheme_dequeue_fonts() {
wp_dequeue_style( 'twentytwelve-fonts' );
}

add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );

/* Enqueue New Google Fonts */


function load_google_fonts() {
            wp_register_style('googleFontsLato','http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic');
            wp_enqueue_style( 'googleFontsLato'); 
            
}
add_action('wp_print_styles', 'load_google_fonts');
 
?>