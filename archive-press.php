<?php
/**
 * Archive Deals Template
 *
 * This template is used to display the archive page for deals.
 *
 * @package cb-firma2025
 */

defined( 'ABSPATH' ) || exit;

$img = wp_get_attachment_image_url( get_field( 'press_hero', 'options' ), 'full' );

get_header();
?>
<main id="main" class="press">
<header class="hero d-flex" style="background-image:url(<?= esc_url( $img ); ?>)">
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-md-6">
                <h1 data-aos="fade">
                    Press
                </h1>
            </div>
        </div>
    </div>
</header>
    <div class="container-xl py-5">
        <div class="row card-group">
            <?php
            while ( have_posts() ) {
                the_post();
                ?>
            <div class="card col-md-4 mb-4 d-flex flex-column justify-content-between">
                <div class="shadow h-100 d-flex flex-column">
                    <?php 
                    $image = get_field('image');
                    if( !empty( $image ) ): ?>
                        <a href="<?= esc_url( get_the_permalink() ); ?>"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="card-img-top" /></a>
                    <?php endif; ?>
                    <div class="card-body p-3 d-flex flex-column justify-content-between h-100">
                        <h2 class="card-title h4"><?= esc_html( get_the_title() ); ?></h2>
                        <div class="mb-2" style="font-size: 0.8rem"><?php echo get_the_date('jS F Y'); ?></div>
                        <p class="card-text"><?= wp_kses_post( wp_trim_words( get_the_content(), 20 ) ); ?></p>
                        <a href="<?= esc_url( get_the_permalink() ); ?>" class="text-center btn d-block text-white p-2">Read more</a>
                    </div>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
    get_template_part( 'page-templates/blocks/cb_bg_cta' );
    ?>
</main>
<?php
get_footer();