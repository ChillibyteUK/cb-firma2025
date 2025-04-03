<?php
/**
 * Template for displaying the latest insights block.
 *
 * @package cb-firma2025
 */

?>
<section class="latest_insights has-tile-bg has-tile-bg--wo has-tile-bg--right py-5">
    <div class="container-xl">
        <h2 class="text-white underline mb-5">Latest Insights</h2>
        <?php
        $q = new WP_Query(
			array(
            	'post_type'      => 'post',
            	'posts_per_page' => 3,
        	)
		);
        if ( $q->have_posts() ) {
            ?>
            <div class="row mb-5">
			<?php
            while ( $q->have_posts() ) {
                $q->the_post();
                ?>
                <div class="col-md-4">
                    <a href="<?= esc_url( get_the_permalink() ); ?>" class="latest_insights__card">
                        <div class="latest_insights__inner">
                            <div class="latest_insights__image">
                                <?= get_the_post_thumbnail( $q->ID, 'medium' ); ?>
                            </div>
                            <h3 class="latest_insights__title"><?= esc_html( get_the_title() ); ?></h3>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
            </div>
            <div class="text-center">
                <a href="/insights/" class="wp-block-button__link wp-block-button__link--wo">All Insights</a>
            </div>
            <?php
        }
        ?>
    </div>
</section>