<?php
/**
 * Feature Section Template
 *
 * This template renders the feature section block with customizable options.
 *
 * @package cb-firma2025
 */

$background = get_field( 'background' ) ? get_field( 'background' ) : '';
$underline  = ! empty( get_field( 'underline' )[0] ) ? 'underline' : '';
$pattern    = ! empty( get_field( 'pattern' )[0] ) ? get_field( 'pattern' )[0] : '';
$pbg        = $pattern ? ( 'Blue' === $background ? 'has-tile-bg has-tile-bg--wo has-tile-bg--right' : 'has-tile-bg has-tile-bg--right' ) : null;
$device     = ! empty( get_field( 'device' )[0] ) ? get_field( 'device' )[0] : '';
$class      = $block['className'] ?? 'py-5';
$text       = '';
$dd         = 'device-primary.svg';

if ( 'Blue' === $background ) {
    $text       = 'text-white';
    $background = 'py-5 has-primary-400-background-color';
    $dd         = 'device-wo.svg';
}

?>
<section class="feature_section <?= esc_attr( trim( "$background $pbg" ) ); ?>">
    <div class="container-xl <?= esc_attr( $class ); ?>">
        <div class="row g-5">
            <div class="col-md-6">
                <?php
                if ( $device ) {
                    ?>
                    <div class="row g-4">
                        <div class="col-2">
                            <img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/' . $dd ); ?>" alt="">
                        </div>
                        <div class="col-10">
                            <h2 class="mb-4 <?= esc_attr( trim( "$text $underline" ) ); ?>">
                                <?= esc_html( get_field( 'title' ) ); ?>
                            </h2>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <h2 class="mb-4 <?= esc_attr( trim( "$text $underline" ) ); ?>">
                        <?= esc_html( get_field( 'title' ) ); ?>
                    </h2>
                    <?php
                }
				?>
            </div>
            <div class="col-md-6 <?= esc_attr( $text ); ?>" data-aos="fade">
                <?= wp_kses_post( get_field( 'content' ) ); ?>
            </div>
        </div>
    </div>
</section>