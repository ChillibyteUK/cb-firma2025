<?php
/**
 * Hero Block Template
 *
 * This template renders the hero block with a background image, title, and optional subtitle.
 *
 * @package cb-firma2025
 */

$img   = wp_get_attachment_image_url( get_field( 'background' ), 'full' );
$class = $block['className'] ?? null;
?>
<section class="hero d-flex <?= esc_attr( $class ); ?>" style="background-image:url(<?= esc_url( $img ); ?>)">
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="row g-4">
            <div class="col-md-6">
                <h1 data-aos="fade">
                    <?= esc_html( get_field( 'title' ) ); ?>
                </h1>
                <?php
                if ( get_field( 'subtitle' ) ) {
                    ?>
                <div class="text-white" data-aos="fade"><?= wp_kses_post( get_field( 'subtitle' ) ); ?></div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>