<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package dekiru
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dekiru_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'dekiru_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function dekiru_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'dekiru_pingback_header' );

// Update CSS within in Admin
// function admin_style() {
//   wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
// }
// add_action('admin_enqueue_scripts', 'admin_style');

// ACF options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name;
}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


// use js datepicker fallback
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

// remove unwanted crap
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_filter( 'render_block', 'wp_render_elements_support', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_elements_support', 10, 2 );

// remove gutenburg crap
function wps_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

// remove custom CSS
remove_action( 'wp_head', 'wp_custom_css_cb', 101 );


// clean up dashboard
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {

global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
}


function move_yoast_to_bottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'move_yoast_to_bottom');

function get_previous_post_id( $post_id ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;
    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;
    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );
    // Get the post object for the previous post
    $previous_post = get_previous_post();
    // Reset our global object
    $post = $oldGlobal;
    if ( '' == $previous_post ) 
        return 0;
    return $previous_post->ID; 
} 

function get_next_post_id( $post_id ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;
    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;
    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );
    // Get the post object for the next post
    $next_post = get_next_post();
    // Reset our global object
    $post = $oldGlobal;
    if ( '' == $next_post ) 
        return 0;
    return $next_post->ID; 
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 16;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Exclude `Uncategorized` category from all terms lists.
 *
 * @param  array $terms Array of taxonomy terms.
 * @return array        List of terms, less 1
 */
function xx_exclude_terms_uncategorized( $terms ) {
	$exclude_terms = [ 1 ]; // Exclude `Uncategorized` category
	if ( ! empty( $terms ) && is_array( $terms ) ) {
		foreach ( $terms as $key => $term ) {
			if ( in_array( $term->term_id, $exclude_terms ) ) {
				unset( $terms[$key] );
			}
		}
	}

	return $terms;
}
add_filter( 'get_the_terms', 'xx_exclude_terms_uncategorized' );