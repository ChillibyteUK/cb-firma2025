<?php

function cb_register_post_types()
{

    $labels = [
        "name" => __("Testimonials", "cb-firma2025"),
        "singular_name" => __("Testimonial", "cb-firma2025"),
    ];

    $args = [
        "label" => __("Testimonials", "cb-firma2025"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => false,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "menu_icon" => "dashicons-open-folder",
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => false,
        "query_var" => true,
        "supports" => [ "title", "thumbnail" ],
        "show_in_graphql" => false,
        "exclude_from_search" => true
    ];

    register_post_type("testimonials", $args);

    $labels = [
        "name" => __("People", "cb-firma2025"),
        "singular_name" => __("Person", "cb-firma2025"),
    ];

    $args = [
        "label" => __("People", "cb-firma2025"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => false,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "menu_icon" => "dashicons-open-folder",
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => false,
        "query_var" => true,
        "supports" => [ "title", "thumbnail" ],
        "show_in_graphql" => false,
        "exclude_from_search" => true
    ];

    register_post_type("people", $args);

    $labels = [
        "name" => __("Deals", "cb-firma2025"),
        "singular_name" => __("Deal", "cb-firma2025"),
    ];

    $args = [
        "label" => __("Deals", "cb-firma2025"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "menu_icon" => "dashicons-open-folder",
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "recent-deals", "with_front" => false ],
        "query_var" => true,
        "supports" => [ "title", "thumbnail" ],
        "show_in_graphql" => false,
        "exclude_from_search" => true
    ];

    register_post_type("deals", $args);

}
add_action('init', 'cb_register_post_types');


function highlight_deals_archive_in_menu($classes, $item) {
    // Get the post type of the current page
    if (is_singular('deals')) {
        // Get the URL of the archive page for the CPT
        $deals_archive_link = get_post_type_archive_link('deals');

        // If the menu item's URL matches the archive URL, add 'current-menu-parent' class
        if ($item->url == $deals_archive_link) {
            $classes[] = 'current-menu-parent';
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'highlight_deals_archive_in_menu', 10, 2);



// add_action( 'after_switch_theme', 'cb_rewrite_flush' );
// function cb_rewrite_flush() {
//     cb_register_post_types();
//     flush_rewrite_rules();
// }
