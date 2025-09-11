<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define( 'CB_THEME_DIR', WP_CONTENT_DIR . '/themes/cb-firma2025' );

require_once CB_THEME_DIR . '/inc/cb-theme.php';

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

    // Get the theme data.
    $the_theme = wp_get_theme();

    $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles  = "/css/child-theme{$suffix}.css";
    $theme_scripts = "/js/child-theme{$suffix}.js";

    wp_enqueue_style(
		'child-understrap-styles',
		get_stylesheet_directory_uri() . $theme_styles,
		array(),
		$the_theme->get( 'Version' )
	);

    wp_enqueue_script( 'jquery' );

	$version = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? gmdate( 'H:i:s' ) : $the_theme->get( 'Version' );

	wp_enqueue_script(
		'child-understrap-scripts',
		get_stylesheet_directory_uri() . $theme_scripts,
		array( 'jquery' ),
		$version,
		true
	);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/**
 * Adds the defer attribute to specific scripts.
 *
 * @param string $tag The script tag for the enqueued script.
 * @param string $handle The script's registered handle.
 * @param string $src The script's source URL.
 * @return string Modified script tag with defer attribute if applicable.
 */
function cb_defer_scripts( $tag, $handle, $src ) {
    $defer = array(
    	'child-understrap-scripts',
    	'jquery',
    );
    if ( in_array( $handle, $defer, true ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'cb_defer_scripts', 10, 3 );

/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'cb-firma2025', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
    return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );

/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
    wp_enqueue_script(
        'understrap_child_customizer',
        get_stylesheet_directory_uri() . '/js/customizer-controls.js',
        array( 'customize-preview' ),
        '20130508',
        true
    );
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

/**
 * Set 'with_front' to false for the 'experts' post type.
 */
add_filter(
    'register_post_type_args',
    function ( $args, $post_type ) {
        if ( 'property' === $post_type && is_array( $args ) ) {
            $args['rewrite']['with_front'] = false;
        }
        return $args;
    },
    99,
    2
);

/**
 * Output Person schema for CPT "people" using ACF fields.
 */
add_action('wp_head', function () {
    if (!is_singular('people')) {
        return;
    }

    global $post;

    // Core values
    $name = get_the_title($post);
    $url  = get_permalink($post);

    // Featured image (full size)
    $img = '';
    if (has_post_thumbnail($post)) {
        $img = wp_get_attachment_image_url(get_post_thumbnail_id($post), 'full');
    }

    // ACF fields (guard if ACF not active)
    $role      = function_exists('get_field') ? (string) get_field('role', $post->ID) : '';
    $email     = function_exists('get_field') ? (string) get_field('email_address', $post->ID) : '';
    $linkedin  = function_exists('get_field') ? (string) get_field('linkedin_profile', $post->ID) : '';
    $bio_raw   = function_exists('get_field') ? (string) get_field('biography', $post->ID) : '';

    // Clean description (optional)
    $description = '';
    if ($bio_raw !== '') {
        $description = trim(wp_strip_all_tags($bio_raw));
    }

    $data = [
        '@context'  => 'https://schema.org/',
        '@type'     => 'Person',
        'name'      => $name,
        'url'       => $url,
        'worksFor'  => [
            '@type' => 'Organization',
            'name'  => 'Firma Partners',
            // 'url' => home_url('/'), // uncomment if you want org URL too
        ],
    ];

    if ($img)        { $data['image'] = $img; }
    if ($role)       { $data['jobTitle'] = $role; }
    if ($email)      { $data['email']   = 'mailto:' . sanitize_email($email); }
    if ($linkedin)   { $data['sameAs']  = [ esc_url_raw($linkedin) ]; }
    if ($description){ $data['description'] = $description; }

    echo '<script type="application/ld+json">' .
         wp_json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
         "</script>\n";
}, 99);