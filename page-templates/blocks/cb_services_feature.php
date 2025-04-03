<?php
/**
 * Template for displaying the CB Services Feature block.
 *
 * @package CB_Firma2025
 */

?>
<section class="services_feature has-tile-bg has-tile-bg--wo has-tile-bg--right py-5">
    <div class="container-xl py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <h2 class="underline mb-4">
                    <?= esc_html( get_field( 'title' ) ); ?>
                </h2>
                <p data-aos="fade" class="mb-4">
                    <?= wp_kses_post( get_field( 'content' ) ); ?>
                </p>
                <?php
                if ( get_field( 'cta' ) ) {
                    $l = get_field( 'cta' );
                    ?>
                <a href="<?= esc_url( $l['url'] ); ?>"
                    class="wp-block-button__link"><?= esc_html( $l['title'] ); ?></a>
                	<?php
                }
				?>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                <?php
                $d = 0;
                while ( have_rows( 'services' ) ) {
                    the_row();
                    $service = acf_slugify( get_sub_field( 'service_name' ) );
                    ?>
                    <div class="col-md-6" data-aos="fade" data-aos-delay="<?= esc_attr( $d ); ?>">
                        <a href="<?= esc_url( get_sub_field( 'link' )['url'] ); ?>" class="services_feature__card">
                            <img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/icon--' . $service . '.svg' ); ?>" class="services_feature__icon" alt="<?= esc_html( get_sub_field( 'service_name' ) ); ?>">
                            <h3><?= esc_html( get_sub_field( 'service_name' ) ); ?></h3>
                            <p><?= wp_kses_post( get_sub_field( 'content' ) ); ?></p>
                            <div class="services_feature__link">Find out more</div>
                        </a>
                    </div>
                    <?php
                    $d += 100;
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>