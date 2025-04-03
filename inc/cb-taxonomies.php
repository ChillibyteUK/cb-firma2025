<?php
/**
 * This file is responsible for registering custom taxonomies for the theme.
 *
 * @package cb-firma2025
 */

/**
 * Registers custom taxonomies for the theme.
 */
function cb_register_taxes() {

	$args = array(
		'label'              => __( 'Teams', 'cb-saascada' ),
		'labels'             => array(
			'name'          => __( 'Teams', 'cb-saascada' ),
			'singular_name' => __( 'Team', 'cb-saascada' ),
		),
		'publicly_queryable' => false,
		'hierarchical'       => true,
		'rewrite'            => false,
		'show_admin_column'  => true,
		'show_tagcloud'      => false,
		'show_in_rest'       => true,
		'rest_base'          => 'apis',
	);

	if ( post_type_exists( 'people' ) ) {
		register_taxonomy( 'teams', array( 'people' ), $args );
	}
}
add_action( 'init', 'cb_register_taxes' );
