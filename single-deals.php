<?php
/**
 * Template for displaying single deals.
 *
 * @package cb-firma2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
$img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
<main id="main" class="single_deal">
    <div class="container-xl mt-5 pt-5">
        <div class="row mb-4">
            <div class="col-md-3 mb-4">
                <div class="deal__sidebar pe-md-4">
                    <section class="breadcrumbs container-xl mt-2">
                    <?php
                    if ( function_exists( 'yoast_breadcrumb' ) ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
                    }
                    ?>
                    </section>
                    <div class="deal__intro">Financial Intermediary For</div>
                    <div class="deal__title"><?= esc_html( get_field( 'deal_title' ) ); ?></div>
                    <div class="deal__value">&pound;<?= esc_html( number_format( get_field( 'deal_value' ) ) ); ?></div>
                    <div class="deal__description_pre"><?= esc_html( get_field( 'description_pre_title' ) ); ?></div>
                    <div class="deal__description"><?= esc_html( get_field( 'description' ) ); ?></div>
                    <div class="deal__finance_pre"><?= esc_html( get_field( 'finance_pre_title' ) ); ?></div>
                    <div class="deal__finance"><?= esc_html( get_field( 'finance_detail' ) ); ?></div>
                    <div class="deal__date"><?= esc_html( get_field( 'deal_date' ) ); ?></div>
                </div>
            </div>
            <div class="col-md-9">
                <h1><?= esc_html( get_the_title() ); ?></h1>
                <div class="deal__image">
                    <?= get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                </div>
                <?= wp_kses_post( apply_filters( 'the_content', get_field( 'deal_details' ) ) ); ?>
            </div>
        </div>
    </div>
    <?php
        $cats = get_the_category();
        $ids  = wp_list_pluck( $cats, 'term_id' );
        $r    = new WP_Query(
			array(
				'post_type'      => 'deals',
				'posts_per_page' => 3,
				'post__not_in'   => array( get_the_ID() ),
			)
		);
        if ( $r->have_posts() ) {
            ?>
        <section class="related py-5">
            <div class="container-xl">
                <h3 class="underline mb-4">Related Deals</h3>
                <div class="row g-4">
                <?php
                while ( $r->have_posts() ) {
                    $r->the_post();
                    ?>
                    <div class="col-md-6 col-xl-3">
                        <a class="related__card" href="<?= esc_url( get_the_permalink() ); ?>">
                            <div class="related__inner">
                                <div class="related__image">
                                    <?= get_the_post_thumbnail( $r->ID, 'medium' ); ?>
                                </div>
                                <div class="related__title p-2"><?= esc_html( get_the_title() ); ?></div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </section>
        	<?php
        }

		get_template_part( 'page-templates/blocks/cb_bg_cta' );
    	?>
</main>
<?php
get_footer();