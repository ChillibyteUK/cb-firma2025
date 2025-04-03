<?php
/**
 * CB Blocks Registration
 *
 * This file contains the registration of custom ACF blocks and modifications
 * to Gutenberg core blocks for the CB Firma 2025 theme.
 *
 * @package cb-firma2025
 */

/**
 * Registers custom ACF blocks for the CB Firma 2025 theme.
 */
function acf_blocks() {
    if ( function_exists( 'acf_register_block_type' ) ) {

        acf_register_block_type(
			array(
				'name'            => 'cb_file_list',
				'title'           => __( 'CB File List' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_file_list.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

        acf_register_block_type(
			array(
				'name'            => 'cb_video_hero',
				'title'           => __( 'CB Video Hero' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_video_hero.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_latest_insights',
				'title'           => __( 'CB Latest Insights' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_latest_insights.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_hero',
				'title'           => __( 'CB Hero' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_hero.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_feature_section',
				'title'           => __( 'CB Feature Section' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_feature_section.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_services_feature',
				'title'           => __( 'CB Services Feature' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_services_feature.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_text_image_feature',
				'title'           => __( 'CB Text/Image Feature' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_text_image_feature.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_testimonial_slider',
				'title'           => __( 'CB Testimonial Slider' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_testimonial_slider.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_bg_cta',
				'title'           => __( 'CB Image CTA' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_bg_cta.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_team_slider',
				'title'           => __( 'CB Team Slider' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_team_slider.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_team_detail',
				'title'           => __( 'CB Team Detail' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_team_detail.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_stat_feature',
				'title'           => __( 'CB Stat Feature' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_stat_feature.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_service_index',
				'title'           => __( 'CB Service Index' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_service_index.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'cb_contact',
				'title'           => __( 'CB Contact' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/cb_contact.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
				),
			)
		);

    }
}
add_action( 'acf/init', 'acf_blocks' );

/**
 * Modify Gutenberg core block type arguments.
 *
 * @param array  $args The block type arguments.
 * @param string $name The block name.
 * @return array Modified block type arguments.
 */
function core_image_block_type_args( $args, $name ) {
	if ( 'core/paragraph' === $name ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
	if ( 'core/list' === $name ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
	if ( 'core/heading' === $name ) {
        $args['render_callback'] = 'modify_core_heading';
    }

    return $args;
}
add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );


/**
 * Adds a container wrapper around the content of certain core blocks.
 *
 * @param array  $attributes The block attributes.
 * @param string $content    The block content.
 * @return string The modified block content with a container wrapper.
 */
function modify_core_add_container( $attributes, $content ) {
    ob_start();
    ?>
<div class="container-xl">
    <?= wp_kses_post( $content ); ?>
</div>
	<?php
    $content = ob_get_clean();
    return $content;
}

/**
 * Modifies the core heading block by adding a container wrapper and an ID.
 *
 * @param array  $attributes The block attributes.
 * @param string $content    The block content.
 * @return string The modified block content with a container wrapper and ID.
 */
function modify_core_heading( $attributes, $content ) {
    ob_start();
    $id = strtolower( wp_strip_all_tags( $content ) );
    $id = cbslugify( $id );
    ?>
<div class="container-xl" id="<?= esc_attr( $id ); ?>">
    <?= wp_kses_post( $content ); ?>
</div>
	<?php
    $content = ob_get_clean();
    return $content;
}
