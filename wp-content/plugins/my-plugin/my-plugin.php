<?php
/*
Plugin Name: My Plugin
Description: API route control
Author: Darko
*/

// Include my-functions.php, use require_once to stop the script if my-functions.php is not found
require_once plugin_dir_path(__FILE__) . 'includes/my-functions.php';


add_action( 'init', 'my_custom_post_custom_article' );

// The custom function to register a custom article post type

function my_custom_post_custom_article() {

// Set the labels, this variable is used in the $args array

$labels = array(
'name'               => __( 'Oglasi' ),
'singular_name'      => __( 'Oglas' ),
'add_new'            => __( 'Dodaj novi oglas' ),
'add_new_item'       => __( 'Dodaj novi oglas' ),
'edit_item'          => __( 'Uredi oglas' ),
'new_item'           => __( 'Novi oglas' ),
'all_items'          => __( 'Svi Oglasi' ),
'view_item'          => __( 'Pregledaj oglas' ),
'search_items'       => __( 'Pretraži oglase' ),
'featured_image'     => 'Poster',
'set_featured_image' => 'Add Poster'
);

// The arguments for our post type, to be entered as parameter 2 of register_post_type()

$args = array(
'labels'            => $labels,
'description'       => 'Holds our custom article post specific data',
'public'            => true,
'menu_position'     => 5,
'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
'has_archive'       => true,
'show_in_admin_bar' => true,
'show_in_nav_menus' => true,
'query_var'         => true,
);

// Call the actual WordPress function

// Parameter 1 is a name for the post type

// Parameter 2 is the $args array

register_post_type( 'article', $args);

}

// Hook our custom function to the pre_get_posts action hook

add_action( 'pre_get_posts', 'add_article_to_frontpage' );

// Alter the main query

function add_article_to_frontpage( $query ) {

if ( is_home() && $query->is_main_query() ) {

$query->set( 'post_type', array( 'article' ) );

}

return $query;

}
