<?php
/**
 * Template for displaying the service index block.
 *
 * @package cb-firma2025
 */

$classes = $block['className'] ?? null;
?>
<section class="service_index <?= esc_attr( $classes ); ?>">
    <div class="container-xl">
        <div class="service_index__grid">
            <?php
    		$children = new WP_Query(
				array(
					'post_type'      => 'page',
					'posts_per_page' => -1,
					'post_parent'    => get_the_ID(),
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
				)
			);
			if ( $children->have_posts() ) {
				while ( $children->have_posts() ) {
					$children->the_post();
					global $post;
					?>
            <a class="service_index__card"
                href="<?= esc_url( get_the_permalink() ); ?>">
                <img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/icon--' . $post->post_name . '.svg' ); ?>"
                    alt="">
                <h3><?= esc_html( get_the_title() ); ?></h3>
            </a>
            		<?php
    			}
			}
			wp_reset_postdata();
			?>
        </div>
    </div>
</section>