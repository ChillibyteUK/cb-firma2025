<?php
/**
 * Custom Post Types Registration
 *
 * This file contains the code to register custom post types
 * such as Testimonials, People, and Deals for the cb-firma2025 theme.
 *
 * @package cb-firma2025
 */

/**
 * Registers custom post types for the theme.
 *
 * This function registers the "Testimonials", "People", and "Deals" custom post types
 * with their respective settings and configurations.
 *
 * @return void
 */
function cb_register_post_types() {

	$args = array(
		'label'                 => __( 'Testimonials', 'cb-firma2025' ),
		'labels'                => array(
			'name'          => __( 'Testimonials', 'cb-firma2025' ),
			'singular_name' => __( 'Testimonial', 'cb-firma2025' ),
		),
		'public'                => true,
		'publicly_queryable'    => false,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => false,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'menu_icon'             => 'dashicons-format-quote',
		'exclude_from_search'   => true,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => false,
		'query_var'             => true,
		'supports'              => array( 'title', 'thumbnail' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'testimonials', $args );

	$args = array(
		'label'                 => __( 'People', 'cb-firma2025' ),
		'labels'                => array(
			'name'          => __( 'People', 'cb-firma2025' ),
			'singular_name' => __( 'Person', 'cb-firma2025' ),
		),
		'public'                => true,
		'publicly_queryable'    => false,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => false,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'menu_icon'             => 'dashicons-groups',
		'exclude_from_search'   => true,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => false,
		'query_var'             => true,
		'supports'              => array( 'title', 'thumbnail' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'people', $args );

	$args = array(
		'label'                 => __( 'Deals', 'cb-firma2025' ),
		'labels'                => array(
			'name'          => __( 'Deals', 'cb-firma2025' ),
			'singular_name' => __( 'Deal', 'cb-firma2025' ),
		),
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'menu_icon'             => 'dashicons-thumbs-up',
		'exclude_from_search'   => true,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => array(
			'slug'       => 'recent-deals',
			'with_front' => false,
		),
		'query_var'             => true,
		'supports'              => array( 'title', 'thumbnail' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'deals', $args );

	$args = array(
		'label'                 => __( 'Press', 'cb-firma2025' ),
		'labels'                => array(
			'name'          => __( 'Press', 'cb-firma2025' ),
			'singular_name' => __( 'Press', 'cb-firma2025' ),
		),
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'menu_icon'             => 'dashicons-media-document',
		'exclude_from_search'   => true,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => array(
			'slug'       => 'press',
			'with_front' => false,
		),
		'query_var'             => true,
		'supports'              => array( 'title', 'editor' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'press', $args );
}
add_action( 'init', 'cb_register_post_types' );

/**
 * Highlights the Deals archive menu item when viewing a single Deal.
 *
 * This function adds the 'current-menu-parent' class to the Deals archive menu item
 * if the current page is a single Deal post.
 *
 * @param array  $classes An array of the CSS classes that are applied to the menu item's <li> element.
 * @param object $item    The current menu item object.
 * @return array Modified array of CSS classes.
 */
function highlight_deals_archive_in_menu( $classes, $item ) {
    // Get the post type of the current page.
    if ( is_singular( 'deals' ) ) {
        // Get the URL of the archive page for the CPT.
        $deals_archive_link = get_post_type_archive_link( 'deals' );

        // If the menu item's URL matches the archive URL, add 'current-menu-parent' class.
		if ( $item->url === $deals_archive_link ) {
            $classes[] = 'current-menu-parent';
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'highlight_deals_archive_in_menu', 10, 2 );
